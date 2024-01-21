<?php

namespace App\Http\Middleware;

use App\Http\Controllers\NotificationController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        $notification_count = $this->notifications();
        view()->share('notification_count', $notification_count);
        return $next($request);
    }

    /**
     * @return mixed
    */
    public function notifications(): mixed
    {
        return app(NotificationController::class)->notificationCount();
    }
}
