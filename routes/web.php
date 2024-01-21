<?php

use App\Http\Controllers\{FrontController, IndexController, NotificationController};
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes([
    'verify' => false, // Email Verification Routes...
    'register' => false,
]);

Route::get('/', [FrontController::class, 'login'])->name('loginpage');
Route::get('logs', [LogViewerController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [IndexController::class, 'dashboard'])->name('dashboard');

    ### Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/count-notifications', [NotificationController::class, 'notificationCount'])->name('count.notifications');
    Route::get('/mark-notifications', [NotificationController::class, 'markAsRead'])->name('mark.notifications');
    Route::get('/view-notifications', [NotificationController::class, 'viewAllNotifications'])->name('view.notifications');
});