<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enroll;
use App\Exam;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Exam as ExamResource;

class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exam::all()->load('subject')->sortByDesc('id');

        if (!Auth::user()->isAdmin() || !Auth::user()->isDepartmentHead()) {
            $enrolls = Enroll::distinct()->select('subject_id')->where('user_id', Auth::id())->get();
            $exams = $exams->whereIn('subject_id', $enrolls->pluck('subject_id'));
        }

        return ExamResource::collection($exams);
    }
}
