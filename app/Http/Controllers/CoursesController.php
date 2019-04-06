<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CoursesExport;

class CoursesController extends Controller
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
        $courses =  Course::all()->sortByDesc('id');

        return view('courses.index', compact('courses'));
    }

    public function export()
    {
        return Excel::download(new CoursesExport(), 'courses.xlsx');
    }

    public function import(Request $request)
    {
        $courses = Excel::toCollection(new CoursesImport(), $request->file('import_file'));
        foreach ($courses[0] as $course) {
            Course::where('id', $course[0])->update([
                'title' => $course[1],
                'code' => $course[2],
                'detail' => $course[3],
                'department_id' => $course->department->name[4],
            ]);
        }
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'departments' => \App\Department::get()->pluck('name', 'id')->prepend('Please select', ''),
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
        $relations = [
            'departments' => \App\Department::get()->pluck('name', 'id'),
        ];

        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course') + $relations);
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
        
        return redirect()->route('courses.index')->with('message', 'Course successfully updated');
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
            $entries = Course::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
