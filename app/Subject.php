<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'course_id'];

    public static function boot()
    {
        parent::boot();

        Subject::observe(new \App\Observers\UserActionsObserver);
    }

    public function setCourseIdAttribute($input)
    {
        $this->attributes['course_id'] = $input ? $input : null;
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'subject_id')->withTrashed();
    }

    public function enroll()
    {
        return $this->hasMany(Enroll::class, 'subject_id')->withTrashed();
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'subject_id')->withTrashed();
    }
}
