<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class AppVersion extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'version_number',
        'status',
        'release_date',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('App version Model')
            ->logFillable()
            ->setDescriptionForEvent(function (string $eventName){
                return "App version id {$this->id} has been {$eventName}.";
            });
    }
}
