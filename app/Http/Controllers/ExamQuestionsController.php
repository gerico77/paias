<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamQuestion;
use App\Exam;
use App\Question;

class ExamQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam_question = ExamQuestion::findOrFail($id);
        $exam_question->delete();

        return redirect()->route('exams.show', $exam_question->exam->id)->with('message', 'Question removed');
    }

    /**
     * Delete all selected resource at once.
     *
     * @param Request $request
     */
    public function massCreate(Request $request)
    {
        if ($request->input('ids')) {
            $questions = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($questions as $question) {
                if (!ExamQuestion::where('question_id', '=', $question->id)->exists()) {
                    ExamQuestion::create([
                        'exam_id' => $request->input('exam_id'),
                        'question_id' => $question->id
                    ]);
                }
                
            }            
        }
    }
}
