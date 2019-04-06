<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Test;
use App\TestAnswer;
use App\Subject;
use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use App\Exam;
use App\ExamQuestion;

class TestsController extends Controller
{   
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('test')->except('index');
    // }

    public function index($exam_id, $user_id)
    {
        $exam_questions = ExamQuestion::inRandomOrder()->get()->where('exam_id', $exam_id);
        foreach ($exam_questions as $exam_question) {
            $exam_question->question->options = QuestionsOption::where('question_id', $exam_question->question->id)->inRandomOrder()->get();
        }

        return view('tests.create', compact('exam_questions'));
    }

    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;

        $test = Test::create([
            'exam_id' => $request->input('exam_id'),
            'user_id' => $request->input('user_id'),
            'result' => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.' . $question) != null
                && QuestionsOption::find($request->input('answers.' . $question))->correct) {
                    
                $status = 1;
                $result++;
            } elseif ($request->input('qtype') == 'identification'
                && $request->input('answer_identification') == Question::find($question)->options->first()->option) {

                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id' => $request->input('user_id'),
                'test_id' => $test->id,
                'question_id' => $question,
                'option_id' => $request->input('answers.' . $question),
                'correct' => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('results.index');
    }

    /**
     * Remove Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('tests.index');
    }

    /**
     * Delete all selected Test at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Test::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
