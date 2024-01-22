<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function dashboard()
    {
        return view('index.dashboard');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function profile(Request $request): View|Factory|Application
    {
        $breadcrumbs = [
            'Profile',
        ];
        $tab = $request->input('tab') ?? null;
        $id = Auth::user()->id;
        $user = User::where('id', $id)->with('roles')->get()->toArray();
        if (!empty($user)) {
            $user = array_shift($user);
        }

        return view('index.profile_view', compact('breadcrumbs', 'tab', 'user'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeChangePassword(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return  redirect('/profile?tab=password')->withInput()->withErrors($validator->errors());
        }

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect('/profile?tab=password')->withInput()->withErrors(['current_password' => 'Current password does not match!']);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notification = array(
            'message' => 'You have successfully changed your password.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
