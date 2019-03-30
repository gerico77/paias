<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'head', 'details'];
    
    public static function boot()
    {
        parent::boot();

        Department::observe(new \App\Observers\UserActionsObserver);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id')->withTrashed();
    }
}
