<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'category_id', 'subject_id', 'user_id', 'time_limit', 'start_date', 'start_time'];

    public static function boot()
    {
        parent::boot();

        Exam::observe(new \App\Observers\UserActionsObserver);
    }


    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function setSubjectIdAttribute($input)
    {
        $this->attributes['subject_id'] = $input ? $input : null;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id')->withTrashed();
    }


    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class)->withTrashed();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->withTrashed();
    }
}
