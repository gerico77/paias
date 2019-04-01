<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Http\Requests\StoreExamsRequest;
use App\Http\Requests\UpdateExamsRequest;
use App\Enroll;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $relations = [
            'exam_questions' => \App\ExamQuestion::get(),
            'tests' => \App\Test::get(),
        ];

        $exams =  Exam::all();

        if (!Auth::user()->isAdmin() || !Auth::user()->isDepartmentHead()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $exams = $exams->whereIn('subject_id', $enrolls->pluck('subject_id'));
        }

        return view('exams.index', compact('exams') + $relations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();

        $relations = [
            'categories' => \App\Category::get()->pluck('title', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->whereIn('id', $enrolls->pluck('subject_id'))->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('exams.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamsRequest $request)
    {
        Exam::create($request->all());

        return redirect()->route('exams.index')->with('message', 'Exam successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);

        $relations = [
            'questions' => \App\Question::get()->where('subject_id', $exam->subject->id),
            'exam_questions' => \App\ExamQuestion::get()->where('exam_id', $id),
        ];

        return view('exams.show', compact('exam') + $relations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();

        $relations = [
            'categories' => \App\Category::get()->pluck('title', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->whereIn('id', $enrolls->pluck('subject_id'))->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $exam = Exam::findOrFail($id);

        return view('exams.edit', compact('exam') + $relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamsRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        
        return redirect()->route('exams.index')->with('message', 'Exam successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exams.index')->with('message', 'Exam successfully deleted');
    }

    /**
     * Delete all selected resource at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Exam::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
