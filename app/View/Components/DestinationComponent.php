<?php

namespace App\View\Components;

use App\Enum\BlogCategory;
use App\Models\Blog\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DestinationComponent extends Component
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
        $destinations = Blog::query()->where('category', BlogCategory::destination->value)->get();

        return view('components.destination-component', compact('destinations'));
    }
}
