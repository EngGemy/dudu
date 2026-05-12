<?php

namespace App\View\Components;

use App\Enum\SliderStatus;
use App\Models\Slider\Slider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderBlogComponent extends Component
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
        $slider = Slider::query()->where('status', SliderStatus::Blog->value)->first();

        return view('components.slider-blog-component', compact('slider'));
    }
}
