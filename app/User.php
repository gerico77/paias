<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
use Mail;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, Notifiable;

    protected $fillable = ['username', 'fname', 'lname', 'email', 'password', 'remember_token', 'role_id'];

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function getFullNameAttribute() {
        return $this->fname . ' ' . $this->lname;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isStudent()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 3) {
                return true;
            }
        }

        return false;
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

    public function isDepartmentHead()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 2) {
                return true;
            }
        }

        return false;
    }

    public function isProfessor()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 3) {
                return true;
            }
        }

        return false;
    }
}
