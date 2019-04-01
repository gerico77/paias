<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Course;
use Illuminate\Http\Request;
use App\Enroll;
use Auth;
use App\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        if (!Auth::user()->isAdmin()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $subjects = $subjects->whereIn('id', $enrolls->pluck('subject_id'));
        }

        return view('home', compact('subjects'));
    }
}
