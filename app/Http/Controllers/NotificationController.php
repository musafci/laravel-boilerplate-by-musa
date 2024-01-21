<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\DentistOfficeProfile;
use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class NotificationController extends Controller
{
    public function __construct()
    {
        // If needed.
    }

    /**
     * @return Application|Factory|View|string
     */
    public function index(): View|Factory|string|Application
    {
        try {
            $notifications = Notification::where('read', 0)->get()->toArray();
            return view('partials.notifications-list', compact('notifications'));
        } catch (Exception $e) {
            Log::info('Notification service failed exception: ' . $e->getMessage());
            return '<p>Notification service failed.</p>';
        }
    }

    /**
     * @return mixed
     */
    public function notificationCount(): mixed
    {
        return Notification::where('read', 0)->count();
    }

    /**
     * @return RedirectResponse
     */
    public function markAsRead(): RedirectResponse
    {
        try {
            Notification::where('read', 0)->update([
                'read' => 1
            ]);
            $message = "Notifications marked as read";
            Log::info($message);
            return back()->with('success', $message);
        } catch (Exception $e) {
            Log::info('Notifications marked as read failed exception: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Notifications marked as read failed']);
        }
    }

    /**
     * @return Application|Factory|View|JsonResponse
     * @throws Exception
     */
    public function viewAllNotifications(): View|Factory|JsonResponse|Application
    {
        $breadcrumbs = [
            'Notification Management'
        ];

        if (request()->ajax()) {
            $query = Notification::get();
            $table = DataTables::of($query);
            $table->editColumn('created_at', function ($row) {
                return  date('j F, Y H:i:s A', strtotime($row->created_at));
            });
            $table->addColumn('name', function($row){
                $user = User::find($row->user_id);
                return $user->name;
            });
            return $table->make(true);
        }

        return view('notifications.index', compact('breadcrumbs'));
    }

}
