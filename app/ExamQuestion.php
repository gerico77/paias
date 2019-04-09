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
        $tests = Test::select('id')->where('exam_id', $this->exam->id)->get();
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

    public function getHiStudentsAnsweredAttribute() {
        $tests = Test::select('id')->where('exam_id', $this->exam->id)->orderByDesc('result');
        $num_of_hi_students = round(count($tests->get()) * 0.27);

        $tests = $tests->limit($num_of_hi_students)->get();

        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);

        return $students_answered;
    }

    public function getLowStudentsAnsweredAttribute() {
        $tests = Test::select('id')->where('exam_id', $this->exam->id)->orderBy('result');
        $num_of_low_students = round(count($tests->get()) * 0.27);

        $tests = $tests->limit($num_of_low_students)->get();

        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);

        return $students_answered;
    }

    public function getHiStudentsDifficultyAttribute() {
        $tests = Test::select('id')->where('exam_id', $this->exam->id)->orderByDesc('result');
        $num_of_hi_students = round(count($tests->get()) * 0.27);

        $tests = $tests->limit($num_of_hi_students)->get();
        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);
        $students_correct = $students_answered->where('correct', 1);

        $item_difficulty = count($students_correct) / count($students_answered);

        return round($item_difficulty, 2);
    }

    public function getLowStudentsDifficultyAttribute() {
        $tests = Test::select('id')->where('exam_id', $this->exam->id)->orderBy('result');
        $num_of_low_students = round(count($tests->get()) * 0.27);

        $tests = $tests->limit($num_of_low_students)->get();
        $test_answers = TestAnswer::all()->whereIn('test_id', $tests->pluck('id'));

        $students_answered = $test_answers->where('question_id', $this->question->id);
        $students_correct = $students_answered->where('correct', 1);

        $item_difficulty = count($students_correct) / count($students_answered);

        return round($item_difficulty, 2);
    }

    public function getIndexOfDiscriminationAttribute() {
        return $this->hi_students_difficulty - $this->low_students_difficulty;
    }

    public function getDiscriminationIdentifierAttribute() {
        $discrimination = $this->index_of_discrimination;
        $identifier = "";
        
        if ($discrimination <= 0.1) {
            $identifier = "PI";
        // } elseif ($discrimination < 0.2) {
        //     $identifier = "MI";
        } elseif ($discrimination < .3) {
            $identifier = "RG";
        } elseif ($discrimination < .4) {
            $identifier = "GI";
        } else {
            $identifier = "VG";
        }

        return $identifier;
    }

    public function getRemarksAttribute() {
        $discrimination = $this->index_of_discrimination;
        $identifier = "";
        
        if ($discrimination <= 0.1) {
            $identifier = "Reject";
        } elseif ($discrimination < 0.2) {
            $identifier = "Revise";
        } else {
            $identifier = "Retain";
        }

        return $identifier;
    }
}
