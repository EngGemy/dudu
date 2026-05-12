<?php

namespace App\View\Components;

use App\Models\GeneralComment\GeneralComment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralCommentComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $general_comments = GeneralComment::query()->take('3')->orderBy('id', 'Desc')->get();

        return view('components.general-comment-component', compact('general_comments'));
    }
}
