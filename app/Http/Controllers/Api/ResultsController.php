<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Test;
use App\Http\Resources\Result as ResultResource;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function index()
    {
        $results = Test::all()->load('user');

        $results = $results->where('user_id', '=', Auth::id());

        return ResultResource::collection($results);
    }
}
