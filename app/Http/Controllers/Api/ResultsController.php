<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Test;
use App\Http\Resources\Result as ResultResource;
use Illuminate\Support\Facades\Auth;
use App\ExamQuestion;

class ResultsController extends Controller
{
    public function index()
    {
        $results = Test::all()->load('user')->load(['exam', 'exam.subject', 'exam.exam_questions']);

        $results = $results->where('user_id', '=', Auth::id())->sortByDesc('id');

        return ResultResource::collection($results);
    }
}