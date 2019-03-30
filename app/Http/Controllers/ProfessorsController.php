<?php

namespace App\Http\Controllers;

use App\User;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class ProfessorsController extends Controller
{
    public function index()
    {
        $users = User::all()->where('role_id', 3);

        return view('professors.index', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function import(Request $request)
    {
        $users = Excel::toCollection(new UsersImport(), $request->file('import_file'));
        foreach ($users[0] as $user) {
            User::where('id', $user[0])->update([
                'username' => $user[1],
                'fname' => $user[2],
                'lname' => $user[3],
                'email' => $user[4],
            ]);
        }
        return redirect()->route('users.index');
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        User::create($request->all());

        return redirect()->route('professors.index');
    }

    /**
     * Remove Professor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = User::findOrFail($id);
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
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
