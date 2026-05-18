<?php

namespace App\Http\Controllers\Website;

use App\Enum\AboutUsStatus;
use App\Enum\PopularVideoStatus;
use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Models\aboutUs\AboutUs;
use App\Models\City;
use App\Models\GallaryPackage;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\PopularVideo\PopularVideo;
use App\Models\Question\Question;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\Tour;
use App\Models\TravelService\TravelService;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::query();
        $header = Slider::query()->where('status', SliderStatus::About_us->value)->first();
        $hotels = Hotel::query()->orderBy('id')->get();

        //        $header = $about_us->where('status', AboutUsStatus::Header->value)->first();

        $who_we_are = $about_us->where('status', AboutUsStatus::Who_We_Are->value)->first();
        $mission = AboutUs::query()->where('status', AboutUsStatus::Mission->value)->first();
        $vision = AboutUs::query()->where('status', AboutUsStatus::Vision->value)->first();
        $about_service = AboutUs::query()->where('status', AboutUsStatus::Services->value)->first();
        $team = AboutUs::query()->where('status', AboutUsStatus::Team->value)->first();

        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        $travel_services = TravelService::query()->orderBy('id')->take(5)->get();
        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')->take(4)->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(4)->get();
        $gallary_packages = GallaryPackage::query()->orderBy('id', 'desc')->take(4)->get();
        $cities = City::query()->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->take(4)->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.about', compact('header', 'nationalities', 'tours', 'services', 'travel_services', 'popular_video', 'popular_videos', 'questions', 'gallary_packages', 'cities', 'who_we_are', 'mission', 'vision', 'about_service', 'team', 'hotels'));
    }
}
