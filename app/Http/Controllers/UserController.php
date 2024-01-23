<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Traits\RedirectWithNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use RedirectWithNotification;
    public function __construct()
    {
        // $this->middleware('permission:user-list|user-create|user-show|user-delete', ['only' => ['index']]);
        // $this->middleware('permission:user-list|user-create|user-show|user-delete', ['only' => ['index']]);
        // $this->middleware('permission:user-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-show', ['only' => ['show']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $breadcrumbs = [
            'User Management'
        ];
        if (request()->ajax()) {
            // $users = User::where('type', 'system-user')->with('roles')->get();
            $users = User::get();
            $query = $users->reject(function ($user, $key) {
                return $user->hasRole('Super Admin');
            });

            $table = Datatables::of($query);
            $actionTemplate = 'user._actions_template';
            $table->editColumn('created_at', function ($row) {
                return $row->created_at->format('jS F, Y H:i:s A');
            });
            $table->editColumn('actions', function ($row) use ($actionTemplate) {
                $routeKey = 'user';
                return view($actionTemplate, compact('row', 'routeKey'));
            });
            return $table->make(true);
        }

        return view('user.index', compact('breadcrumbs'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $breadcrumbs = [
            'User Management' => route('user.index'),
            'Create'
        ];

        $roles = Role::where('guard_name', '!=', 'sanctum')->pluck('name')->toArray();

        return view('user.create', compact('breadcrumbs', 'roles'));
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt('admin123'),
                'type' => 'system-user'
            ])->assignRole($request->role);
            $notification = array(
                'message' => 'User successfully created!',
                'alert-type' => 'success'
            );
        } catch (\Exception $e) {
            \Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = array(
                'message' => "User creation failed!",
                'alert-type' => 'error'
            );
            DB::rollBack();
        }
        DB::commit();

        return redirect()->route('user.index')->with($notification);
    }

    /**
     * @param $user
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($user)
    {
        $breadcrumbs = [
            'User Management' => route('user.index'),
            'Show'
        ];
        $user_data = User::with('roles')->where('id', $user);
        if (!$user_data->exists()) {
            $notification = array(
                'message' => 'No data found!',
                'alert-type' => 'error'
            );

            return redirect()->route('user.index')->with($notification);
        }
        $user = $user_data->get()->toArray();

        return view('user.show', compact('user', 'breadcrumbs'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        $system_user = User::find($request->id);
        if (null == $system_user) {
            DB::rollBack();
            return response()->json(['status' => 'fail']);
        }
        try {
            $system_user->delete();

            $notification = [
                'msg'       => "User successfully deleted.",
                'status'    => 'success'
            ];
        } catch (\Exception $e) {
            \Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = [
                'msg'       => "Failed to delete user!",
                'status'    => 'error'
            ];
            DB::rollBack();
        }
        DB::commit();

        return response()->json($notification);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function changeOwnPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required',
                'string',
                Password::min(6)],
            'new_confirm_password' => ['same:new_password'],
        ]);
        try {
            User::find($request->id)->update(['password'=> Hash::make($request->new_password)]);
            $user_data = User::find($request->id);
            if (!$user_data instanceof User) {
                Log::info('No user details found!');
                return $this->redirectMessage('user.index', 'No user details found!');
            }
            return $this->redirectMessage('user.index', 'Password has been changed successfully.', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('User password change failed exception: ' . $e->getMessage());

            return $this->redirectMessage('user.index', 'User password change failed.');
        }
    }
}
