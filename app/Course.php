<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['courseName', 'courseCode', 'courseDetails'];

    public static function boot()
    {
        parent::boot();

        Course::observe(new \App\Observers\UserActionsObserver);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'subject_id')->withTrashed();
    }
}
