<?php

namespace App\Http\Controllers\Website;

use App\Enum\PopularVideoStatus;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\GallaryPackage;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\PopularVideo\PopularVideo;
use App\Models\Question\Question;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\Tour;
use App\Models\TourType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TourController extends Controller
{
    public function index(Request $request, $slug = null)
    {

        $cities = City::query()->take(7)->get();
        if ($slug != null) {

            $category = Category::where('slug', $slug)->first();
            if (! $category) {
                abort(404);
            }
            $categoryId = $category->id;
            $tours = Tour::query()->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->with('galleries', 'tour_comments', 'tour_overviews')->where('publish', 1);
        } else {
            $category = Category::first();
            $tours = Tour::query()->with('galleries', 'tour_comments')->where('publish', 1);
        }
        $tours = $this->filter($request, $tours);
        $day = $request->day;
        $location = $request->location;
        $types = $request->types;
        $available = $request->available;
        $rate = $request->rate;
        $offer = $request->offer;
        $grpups = $request->grpups;
        $selectedHotel = $request->selectedHotel;
        $checkin_check_out = $request->checkin_check_out;
        $min = $request->min;
        $max = $request->max;

        $categories_id = [];
        if ($category) {
            $categories_id = $category->childrens->pluck('id')->toArray();
            array_push($categories_id, $category->id);
        }
        //       if($category->parent_id != null){
        //           array_push($categories_id,$category->parent_id);
        //       }

        $slider = Slider::query()->first();
        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        $hotels = Hotel::query()->orderBy('id')->get();

        $tours_search = Tour::where('publish', 1)
            ->when(! empty($categories_id), function ($query) use ($categories_id) {
                $query->whereIn('category_id', $categories_id);
            })
            ->orderBy('id', 'desc')
            ->get();

        $parent_category = Category::where('parent_id', null)->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(4)->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();
        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')->take(4)->get();
        $gallary_packages = GallaryPackage::query()->orderBy('id', 'desc')->take(4)->get();
        $tour_types = TourType::get();
        $tour_groups = TourType::get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.egypt_tours', compact('min', 'nationalities', 'max', 'checkin_check_out', 'selectedHotel', 'rate', 'available', 'grpups', 'types', 'location', 'offer', 'day', 'slider', 'tours_search', 'tour_groups', 'tour_types', 'cities', 'gallary_packages', 'popular_videos', 'popular_video', 'questions', 'blogs', 'tours', 'services', 'parent_category', 'categories_id', 'category', 'hotels'));

    }

    public function show($slug)
    {
        $hotels = Hotel::query()->orderBy('id')->get();

        $tour = Tour::with('galleries', 'tour_comments')->where('publish', 1)->orderBy('id', 'desc')->where('slug', $slug)->first();
        $blogs = $tour->blogs()->take(4)->get();
        $slider = Slider::query()->first();
        $services = Service::query()->orderBy('id', 'desc')->take(4)->get();
        if (! $tour) {
            return redirect()->back();
        }
        $tours = Tour::with('galleries', 'tour_comments')->where('is_active', 1)->orderBy('id', 'desc')->take(4)->get();
        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')->take(4)->get();
        $questions = Question::query()->orderBy('id', 'desc')->take(3)->get();
        $gallary_packages = GallaryPackage::query()->orderBy('id', 'desc')->take(4)->get();
        $cities = City::query()->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.tour_details', compact('tour', 'nationalities', 'cities', 'services', 'tours', 'popular_videos', 'popular_video', 'questions', 'gallary_packages', 'hotels', 'blogs'));

    }

    public function filter($date, $tours)
    {

        if (isset($date->day) and $date->day != 'any') {

            $daysValue = $date->day;
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($daysValue) {
                $query->where('values->days', $daysValue); // Adjust this if `days` is actually present
            });

        }
        if (isset($date->checkin_check_out) and $date->checkin_check_out != null) {
            $selectedDate = Carbon::parse($date->checkin_check_out)->format('Y-m-d');
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($selectedDate) {
                $query->where('values->start_date', $selectedDate)->orWhere('values->end_date', $selectedDate); // Adjust this if `days` is actually present
            });
        }
        if (isset($date->selectedHotel) and $date->selectedHotel != 'any') {
            $hotelIds = $date->selectedHotel;
            $tours = $tours->where('hotel_id', $hotelIds);
        }
        if (isset($date->location) and $date->location != 'any') {

            $city_id = $date->location;
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($city_id) {
                $query->where('values->location_to', $city_id)->orWhere('values->location_from', $city_id); // Adjust this if `days` is actually present
            });

        }
        if (isset($date->types) and $date->types != 'any') {

            $types = $date->types;
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($types) {
                $query->where('values->tour_type', $types); // Adjust this if `days` is actually present
            });

        }
        if (isset($date->available) and $date->available != 'any') {

            $available = $date->available;
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($available) {
                $query->where('values->availability', $available); // Adjust this if `days` is actually present
            });

        }
        if (isset($date->rate) and $date->rate != 'any') {

            $rate = $date->rate;
            $tours = $tours->where('rate', $rate);

        }
        if (isset($date->groups) and $date->groups != 'any') {

            $groups = $date->groups;
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($groups) {
                $query->where('values->group_id', $groups); // Adjust this if `days` is actually present
            });

        }
        if (isset($date->offer) and $date->offer != 'any') {

            $offer = $date->offer;
            $tours = $tours->whereRaw('((price - price_offer) / price) * 100 > ?', [$offer]);

        }
        $tours = $tours->paginate(15);

        return $tours;

    }
}
