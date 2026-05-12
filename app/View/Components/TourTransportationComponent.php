<?php

namespace App\View\Components;

use App\Enum\TravelServiceStatus;
use App\Models\Tour;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourTransportationComponent extends Component
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
        $tours_transportation = Tour::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Transportation->value);
        })->orderBy('id', 'desc')->get();

        return view('components.tour-transportation-component', compact('tours_transportation'));
    }
}
