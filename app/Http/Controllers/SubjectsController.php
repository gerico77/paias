<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectsRequest;
use App\Http\Requests\UpdateSubjectsRequest;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use App\Enroll;
use App\Course;
use App\Department;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin' or 'professor' or 'department_head');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $subjects = Subject::all()->sortByDesc('id');

        if (Auth::user()->isProfessor()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $subjects = $subjects->whereIn('id', $enrolls->pluck('subject_id'));
        } elseif (Auth::user()->isDepartmentHead()) {
            $departments = Department::distinct()->select('id')->where('user_id', Auth::id());
            $courses = Course::distinct()->select('id')->whereIn('department_id', $departments->pluck('id'))->get();
            $subjects = $subjects->whereIn('course_id', $courses->pluck('id'));
        }

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'courses' => \App\Course::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('subjects.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectsRequest $request)
    {
        
        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('message', 'Subject successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'courses' => \App\Course::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $subject = Subject::findOrFail($id);

        return view('subjects.edit', compact('subject') + $relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectsRequest $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('message', 'Subject successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('message', 'Subject successfully deleted');
    }

    /**
     * Delete all selected resource at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Subjects::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
