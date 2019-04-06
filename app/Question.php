<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'subject_id', 'qtype'];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);

        static::deleting(function($question) { // before delete() method call this
            $question->options()->delete();
            $question->examQuestions()->delete();
        });
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSubjectIdAttribute($input)
    {
        $this->attributes['subject_id'] = $input ? $input : null;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id')->withTrashed();
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class, 'question_id')->withTrashed();
    }
}
