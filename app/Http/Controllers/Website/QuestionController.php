<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Nationality\Nationality;
use App\Models\Question\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::query()->orderBy('id', 'desc')->take(10)->get();
        $question_count = $questions->count();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.faq', compact('questions', 'nationalities', 'question_count'));
    }
}
