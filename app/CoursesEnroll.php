<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesEnroll extends Model
{
    use Notifiable;

    protected $fillable = ['course_id', 'user_id', 'role_id'];

    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withTrashed();
    }
}
