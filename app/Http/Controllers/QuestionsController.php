<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Enroll;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin' or 'professor' or 'department_head');
    }

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all()->sortByDesc('id');

        if (Auth::user()->isProfessor()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $questions = $questions->whereIn('subject_id', $enrolls->pluck('subject_id'));
        } elseif (Auth::user()->isDepartmentHead()) {
            $departments = Department::distinct()->select('id')->where('user_id', Auth::id())->get();
            $courses = Course::distinct()->select('id')->whereIn('department_id', $departments->pluck('id'))->get();
            $subjects = Subject::distinct()->select('id')->whereIn('course_id', $courses->pluck('id'))->get();
            $questions = $questions->whereIn('subject_id', $courses->pluck('subject_id'));
        }

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($qtype)
    {
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();

        $relations = [
            'subjects' => \App\Subject::get()->whereIn('id', $enrolls->pluck('subject_id'))->pluck('title', 'id')->prepend('Please select', ''),
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

            case "identification":
                $correct_text = [
                    'option1' => 'Answer here'
                ];

                return view('questions.identification.create', $relations);
                break;

            case "enumeration":
                $correct_text = [
                    'option1' => 'Answer here'
                ];

                return view('questions.enumeration.create', $relations);
                break;
                
            case "truefalse":
                $correct_options = [
                    'option1' => 'True',
                    'option2' => 'False'
                ];

                return view('questions.truefalse.create', compact('correct_options') + $relations);
                break;

            case "tier":
                $correct_options = [
                    'option1' => 'Option #1',
                    'option2' => 'Option #2',
                    'option3' => 'Option #3',
                    'option4' => 'Option #4',
                    'option5' => 'Option #5'
                ];

                return view('questions.tier.create', compact('correct_options') + $relations);
                break;
             case "rubrics":
                $correct_text = [
                    'option1' => 'Answer here'
                ];

                return view('questions.rubrics.create', $relations);
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
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
        
        $relations = [
            'subjects' => \App\Subject::get()->whereIn('id', $enrolls->pluck('subject_id'))->pluck('title', 'id')->prepend('Please select', ''),
            'questions_options' => \App\QuestionsOption::get()->where('question_id', $id),
        ];

        $question = Question::findOrFail($id);

        switch ($qtype) {
            case "multichoice":
                return view('questions.multichoice.edit', compact('question') + $relations);
                break;

            case "identification":
                return view('questions.identification.edit', compact('question') + $relations);
                break;

            case "enumeration":
                return view('questions.enumeration.edit', compact('question') + $relations);
                break;

            case "truefalse":
                return view('questions.truefalse.edit', compact('question') + $relations);
                break;
            case "tier":
                return view('questions.tier.edit', compact('question') + $relations);
                break;
            case "rubrics":
                return view('questions.rubrics.edit', compact('question') + $relations);
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
            'subjects' => \App\Subject::get(),
        ];

        $question = Question::findOrFail($id);
         
        switch ($qtype) {
            case "multichoice":
                return view('questions.multichoice.show', compact('question') + $relations);
                break;

            case "identification":
                return view('questions.identification.show', compact('question') + $relations);
                break;

            case "enumeration":
                return view('questions.enumeration.show', compact('question') + $relations);
                break;

            case "truefalse":
                return view('questions.truefalse.show', compact('question') + $relations);
                break;

            case "tier":
                return view('questions.tier.show', compact('question') + $relations);
                break;
             case "rubrics":
                return view('questions.rubrics.show', compact('question') + $relations);
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
