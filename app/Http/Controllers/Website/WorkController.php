<?php

namespace App\Http\Controllers\Website;

use App\Enum\SliderStatus;
use App\Enum\WorkStatus;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\Tour;
use App\Models\TravelService\TravelService;
use App\Models\Work\Work;

class WorkController extends Controller
{
    public function index()
    {
        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        $travel_services = TravelService::query()->get();
        $hotels = Hotel::query()->orderBy('id')->get();
        $cities = City::query()->get();
        $slider = Slider::query()->where('status', SliderStatus::Works->value)->first();
        $work_a = Work::query()->where('status', WorkStatus::A->value)->first();
        $work_b = Work::query()->where('status', WorkStatus::B->value)->first();
        $work_c = Work::query()->where('status', WorkStatus::C->value)->first();
        $work_d = Work::query()->where('status', WorkStatus::D->value)->first();
        $work_e = Work::query()->where('status', WorkStatus::E->value)->first();
        $work_f = Work::query()->where('status', WorkStatus::F->value)->first();
        $work_g = Work::query()->where('status', WorkStatus::G->value)->first();
        $tours = Tour::where('publish', 1)->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.how-it-works', compact('services', 'nationalities', 'tours', 'cities', 'travel_services', 'work_a', 'work_b', 'work_c', 'work_d', 'work_e', 'work_f', 'work_g', 'slider', 'hotels'));
    }
}
