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

    
    public function getDifficultyAttribute() {
        $tests = Test::distinct()->select('id')->where('exam_id', $this->exam->id)->get();
        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);
        $students_correct = $students_answered->where('correct', 1);

        $item_difficulty = count($students_correct) / count($students_answered);

        return round($item_difficulty, 2);
    }

    public function getDifficultyIdentifierAttribute() {
        $difficulty = $this->difficulty;
        $identifier = "";
        
        if ($difficulty <= .3) {
            $identifier = "DI";
        } elseif ($difficulty >= .75) {
            $identifier = "EI";
        } elseif ($difficulty > .3 && $difficulty < .75) {
            $identifier = "AI";
        }   

        return $identifier;
    }

    public function getStudentsAnsweredAttribute() {
        $tests = Test::distinct()->select('id')->where('exam_id', $this->exam->id)->get();
        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);

        return $students_answered;
    }
}
