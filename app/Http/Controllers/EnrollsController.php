<?php

namespace App\Http\Controllers;

use Auth;
use App\Enroll;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnrollsRequest;
use App\Http\Requests\UpdateEnrollsRequest;
use Illuminate\Foundation\Auth\User;
use App\Department;
use App\Course;
use App\Subject;

class EnrollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin' or 'professor' or 'department_head');
    }

    /**
     * Display a listing of Enroll.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = Enroll::all()->sortByDesc('id');

        if (Auth::user()->isProfessor()) {
            $subject_id = Enroll::distinct()->where('user_id', Auth::id())->get();
            $enrolls = $enrolls->whereIn('subject_id', $subject_id->pluck('subject_id'));
        } elseif (Auth::user()->isDepartmentHead()) {
            $departments = Department::distinct()->select('id')->where('user_id', Auth::id());
            $courses = Course::distinct()->select('id')->whereIn('department_id', $departments->pluck('id'))->get();
            $subjects = Subject::whereIn('course_id', $courses->pluck('id'));
        }

        return view('enrolls.index', compact('enrolls'));
    }

    /**
     * Show the form for creating new Enroll.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
        
        $relations = [
            'users' => \App\User::get()->sortBy('full_name')->pluck('full_name', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('enrolls.create', $relations);
    }

    /**
     * Store a newly created Enroll in storage.
     *
     * @param  \App\Http\Requests\StoreEnrollsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrollsRequest $request)
    {
        Enroll::create($request->all());

        return redirect()->route('enrolls.index');
    }

    /**
     * Show the form for editing Enroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();

        $relations = [
            'users' => \App\User::get()->sortBy('full_name')->pluck('full_name', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->whereIn('id', $enrolls->pluck('subject_id'))->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $enroll = Enroll::findOrFail($id);

        return view('enrolls.edit', compact('enroll') + $relations);
    }

    /**
     * Update Enroll in storage.
     *
     * @param  \App\Http\Requests\UpdateEnrollsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnrollsRequest $request, $id)
    {
        $enroll = Enroll::findOrFail($id);
        $enroll->update($request->all());

        return redirect()->route('enrolls.index');
    }


    /**
     * Display Enroll.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'users' => \App\User::get()->pluck('fname' . ' ' . 'lname', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get(),
        ];

        $enroll = Enroll::findOrFail($id);

        return view('enrolls.show', compact('enroll') + $relations);
    }


    /**
     * Remove Enroll from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enroll = Enroll::findOrFail($id);
        $enroll->delete();

        return redirect()->route('enrolls.index');
    }

    /**
     * Delete all selected Enroll at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Enroll::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
