<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Exam;
use App\Question;

class ExamQuestion extends Model
{
    use SoftDeletes;

    protected $fillable = ['exam_id', 'question_id'];

    public static function boot()
    {
        parent::boot();

        ExamQuestion::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setExamIdAttribute($input)
    {
        $this->attributes['exam_id'] = $input ? $input : null;
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id')->withTrashed();
    }
    

    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id')->withTrashed();
    }
}
