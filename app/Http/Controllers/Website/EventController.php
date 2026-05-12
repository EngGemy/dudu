<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\Event;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\Question\Question;
use App\Models\Slider\Slider;
use App\Models\Tour;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $cities = City::query()->get();
        $slider = Slider::query()->first();
        $hotels = Hotel::query()->orderBy('id')->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(4)->get();

        $events = Event::with('galleries', 'information')->where('is_active', 1)->orderBy('id', 'desc')->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('is_active', 1)->orderBy('id', 'desc')->take(4)->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.events', compact('slider', 'nationalities', 'cities', 'events', 'tours', 'events', 'questions', 'hotels', 'blogs'));

    }

    public function show($slug)
    {

        $event = Event::with('galleries', 'information')->where('is_active', 1)->orderBy('id', 'desc')->where('slug', $slug)->first();
        $slider = Slider::query()->first();
        if (! $event) {
            return redirect()->back();
        }
        $tours = Tour::with('galleries', 'tour_comments')->where('is_active', 1)->orderBy('id', 'desc')->take(4)->get();
        $cities = City::query()->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.event_details', compact('event', 'cities', 'nationalities', 'tours', 'questions'));

    }
}
