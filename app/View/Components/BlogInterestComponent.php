<?php

namespace App\View\Components;

use App\Enum\BlogCategory;
use App\Models\Blog\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogInterestComponent extends Component
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
        $interests = Blog::query()->where('category', BlogCategory::interest->value)->get();

        return view('components.blog-interest-component', compact('interests'));
    }
}
