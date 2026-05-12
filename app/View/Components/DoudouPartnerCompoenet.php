<?php

namespace App\View\Components;

use App\Models\DoudouPartner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DoudouPartnerCompoenet extends Component
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
        $partner_gallary = DoudouPartner::query()->get();

        return view('components.doudou-partner-compoenet', compact('partner_gallary'));
    }
}
