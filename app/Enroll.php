<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Enroll extends Model
{
    use Notifiable;

    protected $fillable = ['user_id', 'subject_id'];

    public static function boot()
    {
        parent::boot();

        Enroll::observe(new \App\Observers\UserActionsObserver);
    }

    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id')->withTrashed();
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setSubjectIdAttribute($input)
    {
        $this->attributes['subject_id'] = $input ? $input : null;
    }

    public function subject()
    {
        // return $this->belongsTo(User::class, 'subject_id')->withTrashed();
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function isAdmin()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 1) {
                return true;
            }
        }

        return false;
    }
}
