<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($qtype)
    {
        $relations = [
            'subjects' => \App\Subject::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        switch ($qtype) {
            case "multichoice":
                $correct_options = [
                    'option1' => 'Option #1',
                    'option2' => 'Option #2',
                    'option3' => 'Option #3',
                    'option4' => 'Option #4',
                    'option5' => 'Option #5'
                ];
        
                return view('questions.multichoice.create', compact('correct_options') + $relations);
                break;
        }
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {

        $question = Question::create($request->all());

        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option' => $value,
                    'correct' => $status
                ]);
            }
        }

        return redirect()->route('questions.index')->with('message', 'Question successfully created');
    }


    /**
     * Show the form for editing Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($qtype, $id)
    {
        
        $relations = [
            'subjects' => \App\Subject::get()->pluck('title', 'id'),
            'questions_options' => \App\QuestionsOption::get()->where('question_id', $id),
        ];

        $question = Question::findOrFail($id);

        switch ($qtype) {
            case "multichoice":
                return view('questions.multichoice.edit', compact('question') + $relations);
                break;
        }
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions.index')->with('message', 'Question successfully updated')->prepend('Please select', '');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($qtype, $id)
    {
        $relations = [
            'subjects' => \App\Subject::get()->pluck('title', 'id'),
        ];

        $question = Question::findOrFail($id);
        // dd(compact('question') + $relations);
        switch ($qtype) {
            case "multichoice":
                return view('questions.multichoice.show', compact('question') + $relations);
                break;
        }        
    }


    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('message', 'Question successfully deleted');
    }

    /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
