<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamQuestion;

class ItemAnalysisController extends Controller
{
    public function show($id)
    {
        $exam_questions = ExamQuestion::get()->where('exam_id', $id);

        return view('item_analysis.show', compact('exam_questions'));
    }
}
