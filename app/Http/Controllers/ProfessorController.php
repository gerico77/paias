<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('professors');
    }

    /**
     * Display a listing of Professor.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();

        return view('professors.index', compact('professors'));
    }

    /**
     * Show the form for creating new Professor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('professors.create', $relations);
    }

    /**
     * Store a newly created Professor in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        Professor::create($request->all());

        return redirect()->route('professors.index');
    }


    /**
     * Show the form for editing Professor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $professor = Professor::findOrFail($id);

        return view('professors.edit', compact('professor') + $relations);
    }

    /**
     * Update Professor in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());

        return redirect()->route('professors.index');
    }


    /**
     * Display Professor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $professor = Professor::findOrFail($id);

        return view('professors.show', compact('professor') + $relations);
    }


    /**
     * Remove Professor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professors.index');
    }

    /**
     * Delete all selected Professor at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Professor::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
