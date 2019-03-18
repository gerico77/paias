<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'task_date'];

    public static function boot()
    {
        parent::boot();

        Task::observe(new \App\Observers\UserActionsObserver);
    }
}
