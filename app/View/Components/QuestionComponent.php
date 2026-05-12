<?php

namespace App\View\Components;

use App\Models\Question\Question;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();

        return view('components.question-component', compact('questions'));
    }
}
