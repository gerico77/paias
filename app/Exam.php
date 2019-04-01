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

        static::deleting(function($exam) { // before delete() method call this
            $exam->exam_questions()->delete();
       });
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


    public function exam_questions()
    {
        return $this->hasMany(ExamQuestion::class)->withTrashed();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->withTrashed();
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDatetimeAttribute() {
        $combinedDT = date('Y-m-d H:i:s', strtotime("$this->start_date $this->start_time"));
        return $combinedDT;
    }

    public function isOpen()
    {
        date_default_timezone_set('Asia/Manila');
        $today = date("Y-m-d H:i:s");
        $date = $this->start_datetime;

        if ($date <= $today) {
           return true;
        }

        return false;
    }
}
