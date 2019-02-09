<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_id', 'title', 'code', 'details'];

    public static function boot()
    {
        parent::boot();

        Course::observe(new \App\Observers\UserActionsObserver);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'subject_id')->withTrashed();
    }
}
