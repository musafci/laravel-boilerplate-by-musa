<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'subject',
        'message',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Notification Model')
            ->logFillable()
            ->setDescriptionForEvent(function (string $eventName){
                return "Notification {$this->id} has been {$eventName}.";
            });
    }
}
