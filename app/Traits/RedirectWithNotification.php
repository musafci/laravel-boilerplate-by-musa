<?php

namespace App\Traits;

use Illuminate\Http\RedirectResponse;

trait RedirectWithNotification{
    
    /**
     * @param $route
     * @param string $message
     * @param string $alert_type
     * @return RedirectResponse
     */
    function redirectMessage($route, string $message = "No data found!", string $alert_type = "error"): RedirectResponse
    {
        $notification = array(
            'message' => $message,
            'alert-type' => $alert_type
        );

        return redirect()->route($route)->with($notification);
    }
}