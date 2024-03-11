<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class AppSetting extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'app_name',
        'app_description',
        'logo',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('App setting Model')
            ->logFillable()
            ->setDescriptionForEvent(function (string $eventName){
                return "App setting id {$this->id} has been {$eventName}.";
            });
    }
}
