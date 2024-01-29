<?php

use App\Http\Controllers\{CategoryController, FrontController, IndexController, NotificationController, UserController};
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

    Route::get('profile', [IndexController::class, 'profile'])->name('profile');

    ### Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::post('/delete-user', [UserController::class, 'destroy'])->name('delete-user.destroy');
    Route::post('/change-password/{user}', [UserController::class, 'changeOwnPassword'])->name('user.change-password');

    ### All Admin
    Route::post('change-password', [IndexController::class, 'storeChangePassword'])->name('store.change.password');


    ### Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/count-notifications', [NotificationController::class, 'notificationCount'])->name('count.notifications');
    Route::get('/mark-notifications', [NotificationController::class, 'markAsRead'])->name('mark.notifications');
    Route::get('/view-notifications', [NotificationController::class, 'viewAllNotifications'])->name('view.notifications');


    ### Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('category-delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category-parent/{category}', [CategoryController::class, 'parent'])->name('category.parent');
});