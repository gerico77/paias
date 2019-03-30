<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\Student as StudentResource;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::all();

        $students = $students->where('id', Auth::id());

        return StudentResource::collection($students);
    }
}
