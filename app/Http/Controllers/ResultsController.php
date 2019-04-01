<?php

namespace App\Http\Controllers;

use Auth;
use App\Test;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultsExport;
use App\Enroll;
use App\Exam;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');

        if (Auth::user()->isStudent()) {
            $results = $results->where('user_id', '=', Auth::id());
        } elseif (Auth::user()->isProfessor()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $exams = Exam::whereIn('subject_id', $enrolls->pluck('subject_id'));
            $results = $results->whereIn('exam_id', $exams->pluck('id'));
        }

        return view('results.index', compact('results'));
    }

    public function export()
    {
        return Excel::download(new ResultsExport(), 'results.xlsx');
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();
        }

        return view('results.show', compact('test', 'results'));
    }
}