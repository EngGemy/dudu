<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\Question\Question;
use App\Models\SpecialOffer\SpecialOffer;
use App\Models\Tour;

class SpecialOfferController extends Controller
{
    public function index()
    {
        $cities = City::query()->get();
        $special_offers = SpecialOffer::query()->orderBy('id', 'desc')->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(4)->get();
        $hotels = Hotel::query()->orderBy('id')->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->get();

        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.loyalty-program', compact('cities', 'nationalities', 'special_offers', 'questions', 'hotels', 'tours'));
    }
}
