<?php

namespace App\Http\Controllers\Website;

use App\Enum\PartnerStatus;
use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\Partner\Partner;
use App\Models\Slider\Slider;
use App\Models\Tour;

class DouduoPartnerController extends Controller
{
    public function index()
    {
        $slider = Slider::query()->where('status', SliderStatus::Partners->value)->first();
        $partner_header = Partner::query()->where('status', PartnerStatus::Header->value)->first();
        $partner_body = Partner::query()->where('status', PartnerStatus::Body->value)->first();
        $hotels = Hotel::query()->orderBy('id')->get();
        $cities = City::query()->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.partner', compact('slider', 'nationalities', 'tours', 'cities', 'partner_header', 'partner_body', 'hotels'));

    }
}
