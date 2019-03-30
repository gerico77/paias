<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesEnrollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin' or 'professor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses_enroll = CoursesEnroll::all();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'courses' => \App\Course::get()->pluck('courseName', 'id')->prepend('Please select', ''),
            'users' => \App\User::get()->pluck('username', 'id')->prepend('Please select', ''),
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        

        return view('courses.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $request)
    {
        Course::create($request->all());

        return redirect()->route('courses.index')->with('message', 'Course successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'))->with('message', 'Course successfully updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('message', 'Course successfully deleted');
    }

    /**
     * Delete all selected resource at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Courses::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
