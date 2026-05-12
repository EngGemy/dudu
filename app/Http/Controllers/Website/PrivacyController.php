<?php

namespace App\Http\Controllers\Website;

use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Nationality\Nationality;
use App\Models\Privacy\Privacy;
use App\Models\Slider\Slider;
use App\Models\Terms\Term;
use App\Models\Tour;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy = Privacy::query()->orderBy('id', 'Desc')->get();
        $slider = Slider::query()->where('status', SliderStatus::Privacy->value)->first();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();
        $cities = City::query()->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->get();

        return view('front.privacy', compact('privacy', 'nationalities', 'slider', 'cities', 'tours'));
    }

    public function terms()
    {
        $terms = Term::query()->orderBy('id', 'Desc')->get();
        $slider = Slider::query()->where('status', SliderStatus::Terms->value)->first();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();
        $cities = City::query()->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->get();

        return view('front.terms', compact('terms', 'nationalities', 'slider', 'cities', 'tours'));

    }
}
