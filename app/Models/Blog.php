<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Blog extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'category_id',
        'title',
        'body',
        'image',
        'created_by',
        'updated_by',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Blog Model')
            ->logFillable()
            ->setDescriptionForEvent(function (string $eventName){
                return "Blog id {$this->id} has been {$eventName}.";
            });
    }
}
