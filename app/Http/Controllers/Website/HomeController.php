<?php

namespace App\Http\Controllers\Website;

use App\Enum\PopularVideoStatus;
use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\CommunityPost;
use App\Models\GallaryPackage;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\PopularVideo\PopularVideo;
use App\Models\Question\Question;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $slider = Slider::query()->where('status', SliderStatus::Home->value)->first();
        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        $tours = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->take(4)->get();
        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $hotels = Hotel::query()->orderBy('id')->get();
        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')
            ->where('status', PopularVideoStatus::ACTIVE->value)->get();
        $cities = City::query()->orderBy('id', 'desc')->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(4)->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();
        $gallary_packages = GallaryPackage::query()->orderBy('id', 'desc')->take(4)->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->get();

        $communityPosts = Cache::remember('community_posts', 3600, function () {
            return CommunityPost::active()->get();
        });

        return view('front.new_index', compact('slider', 'services', 'tours', 'popular_video', 'popular_videos', 'cities', 'blogs', 'questions', 'gallary_packages', 'hotels', 'nationalities', 'communityPosts'));
    }

    public function Search(Request $request)
    {

        // dd($request->all());
        $tourQuery = Tour::query();
        $tours = $tourQuery->when(isset($request->checkInCheckOut), function ($query) use ($request) {
            $checkInCheckOut = $request->checkInCheckOut;
            $checkInCheckOut = explode(' to ', $request->checkInCheckOut);
            $checkIn = trim($checkInCheckOut[0]);
            $checkOut = trim($checkInCheckOut[1]);

            return $query->whereDate('created_at', '>=', $checkIn)
                ->whereDate('created_at', '<=', $checkOut);

        })->when(isset($request->selectedHotelRate), function ($query) use ($request) {

            return $query->where('rate', $request->selectedHotelRate);

        })->when(isset($request->minPrice) && isset($request->maxPrice), function ($query) use ($request) {
            return $query->whereBetween('price', [$request->minPrice, $request->maxPrice]);
        })
            ->orderBy('id', 'desc')->get();

        $html = View::make('front.component.recommand-tour')->with('tours', $tours)->render();

        return [
            'output' => $html,
        ];

    }

    public function tour_search(Request $request)
    {
        $tourQuery = Tour::query()->with('translations');

        // Text search across translated names
        $tourQuery->when($request->query('search'), function ($query) use ($request) {
            $search = $request->query('search');
            $locale = app()->getLocale();

            return $query->whereHas('translations', function ($q) use ($search, $locale) {
                $q->where('locale', $locale)
                    ->where('name', 'LIKE', '%'.$search.'%');
            });
        });

        // Filter by check-in and check-out dates if provided
        $tourQuery->when($request->query('checkIn_checkOut'), function ($query) use ($request) {
            $checkInCheckOut = explode(' to ', $request->query('checkIn_checkOut'));
            $checkIn = trim($checkInCheckOut[0]);
            $checkOut = trim($checkInCheckOut[1]);

            return $query->whereDate('created_at', '>=', $checkIn)
                ->whereDate('created_at', '<=', $checkOut);
        });

        // Filter by selected hotel if provided
        $tourQuery->when($request->query('selectedHotel'), function ($query) use ($request) {
            $hotelIds = $request->query('selectedHotel');
            $query->whereIn('id', $hotelIds);
        });

        // Filter by budget range if provided
        if ($request->has('min') && $request->has('max')) {
            $minPrice = $request->input('min');
            $maxPrice = $request->input('max');
            $tourQuery->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Execute the query and get the results
        $tours = $tourQuery->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();
        $hotels = Hotel::query()->orderBy('id')->get();
        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        $slider = Slider::query()->where('status', SliderStatus::Home->value)->first();

        return view('front.recommand-toure-search', compact('tours', 'slider', 'services', 'hotels', 'nationalities'));
    }
}
