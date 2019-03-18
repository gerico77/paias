<?php

namespace App\Http\Controllers;

use App\Enroll;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnrollsRequest;
use App\Http\Requests\UpdateEnrollsRequest;

class EnrollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of Enroll.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = Enroll::all();

        return view('enrolls.index', compact('enrolls'));
    }

    /**
     * Show the form for creating new Enroll.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'users' => \App\User::get()->pluck('full_name', 'id')->prepend('Please select', ''),
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
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'users' => \App\User::get()->pluck('username', 'fname', 'lname', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->pluck('title', 'id')->prepend('Please select', ''),
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
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'users' => \App\User::get()->pluck('fname' . ' ' . 'lname', 'id')->prepend('Please select', ''),
            'subjects' => \App\Subject::get()->pluck('title', 'id')->prepend('Please select', ''),
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
