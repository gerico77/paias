<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];

    public static function boot () {
        parent::boot();

        Role::observe(new \App\Observers\UserActionsObserver);
    }
}
