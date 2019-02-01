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

class TestsController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subjects = Subject::inRandomOrder()->limit(10)->get();

        $questions = Question::inRandomOrder()->limit(10)->get();
        foreach ($questions as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }

        /*
        foreach ($subjects as $subject) {
            if ($subject->questions->count()) {
                $questions[$subject->id]['subject'] = $subject->title;
                $questions[$subject->id]['questions'] = $subject->questions()->inRandomOrder()->first()->load('options')->toArray();
                shuffle($questions[$subject->id]['questions']['options']);
            }
        }
         */

        return view('tests.create', compact('questions'));
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
            'user_id' => Auth::id(),
            'result' => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.' . $question) != null
                && QuestionsOption::find($request->input('answers.' . $question))->correct) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id' => Auth::id(),
                'test_id' => $test->id,
                'question_id' => $question,
                'option_id' => $request->input('answers.' . $question),
                'correct' => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('results.show', [$test->id]);
    }
}
