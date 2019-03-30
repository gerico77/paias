<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Course;
use Illuminate\Http\Request;
use App\Enroll;
use Auth;

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
        $enrolls = Enroll::all()->load('user');

        if (!Auth::user()->isAdmin()) {
            $enrolls = $enrolls->where('user_id', '=', Auth::user()->id);
        }

        return view('home', compact('enrolls'));
    }
}
