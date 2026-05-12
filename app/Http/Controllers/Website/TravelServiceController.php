<?php

namespace App\Http\Controllers\Website;

use App\Enum\PopularVideoStatus;
use App\Enum\SliderStatus;
use App\Enum\TravelServiceStatus;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Nationality\Nationality;
use App\Models\PopularVideo\PopularVideo;
use App\Models\Question\Question;
use App\Models\Slider\Slider;
use App\Models\Tour;
use App\Models\TourType;
use App\Models\TravelService\TravelService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TravelServiceController extends Controller
{
    public function index(Request $request)
    {
        $slider = Slider::query()->where('status', SliderStatus::Services->value)->first();
        $travel_accommodation = TravelService::query()->where('status', TravelServiceStatus::Accommodation->value)->first();
        $travel_services = TravelService::query()->get();
        $tours_Accommodation = Tour::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Accommodation->value);
        })->orderBy('id', 'desc')->get();
        $tours_Accommodation_count = Tour::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Accommodation->value);
        })->orderBy('id', 'desc')->count();
        $tours = Tour::query()->with('galleries', 'tour_comments')->where('publish', 1);

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

        $questions = Question::query()->orderBy('id', 'desc')->take(4)->get();
        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $hotels = Hotel::query()->orderBy('id')->get();

        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')->take(4)->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(4)->get();
        $accommodation_blogs = Blog::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Accommodation->value);
        })->orderBy('id', 'desc')->get();
        $cities = City::query()->orderBy('id', 'desc')->get();
        $tour_types = TourType::get();
        $tour_groups = TourType::get();
        $tours_search = Tour::where('publish', 1)->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        //        return view('front.services',compact('travel_services', 'tours', 'questions', 'blogs', 'popular_video', 'popular_videos', 'tours_Accommodation','slider','travel_accommodation','tours_Accommodation_count'));
        return view('front.services.new_services', compact('min', 'nationalities', 'max', 'checkin_check_out', 'selectedHotel', 'rate', 'available', 'grpups', 'types', 'location', 'offer', 'day', 'tours_search', 'tour_groups', 'tour_types', 'cities', 'travel_services', 'tours', 'questions', 'blogs', 'popular_video', 'popular_videos', 'tours_Accommodation', 'slider', 'travel_accommodation', 'tours_Accommodation_count', 'accommodation_blogs', 'hotels'));

    }

    public function transportation_service()
    {

        $slider = Slider::query()->where('status', SliderStatus::Services->value)->first();

        $travel_transportation = TravelService::query()->where('status', TravelServiceStatus::Transportation->value)->first();
        $travel_services = TravelService::query()->get();

        $tours_transportation = Tour::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Transportation->value);
        })->orderBy('id', 'desc')->get();
        $tours_transportation_count = Tour::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Transportation->value);
        })->orderBy('id', 'desc')->count();

        $popular_video = PopularVideo::query()
            ->where('status', PopularVideoStatus::ACTIVE->value)
            ->first();
        if (empty($popular_video)) {
            $popular_video = PopularVideo::query()->orderBy('id', 'desc')->first();
        }
        $popular_videos = PopularVideo::query()->orderBy('id', 'desc')->take(4)->get();

        $transportation_blogs = Blog::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Transportation->value);
        })->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.services-transportation', compact('tours_transportation', 'nationalities', 'tours_transportation_count', 'popular_video', 'popular_videos', 'travel_transportation', 'slider', 'travel_services', 'transportation_blogs'));

    }

    public function flight_reservation()
    {
        $slider = Slider::query()->where('status', SliderStatus::Services->value)->first();
        $travel_transportation = TravelService::query()->where('status', TravelServiceStatus::Flight_Reservation->value)->first();
        $travel_services = TravelService::query()->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(5)->get();

        $flight_blogs = Blog::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Flight_Reservation->value);
        })->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.services-flight-reservation', compact('travel_transportation', 'nationalities', 'slider', 'travel_services', 'blogs', 'flight_blogs'));

    }

    public function visa_formalities()
    {
        $slider = Slider::query()->where('status', SliderStatus::Services->value)->first();
        $travel_transportation = TravelService::query()->where('status', TravelServiceStatus::Visa_Formalities->value)->first();
        $travel_services = TravelService::query()->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(5)->get();

        $visa_blogs = Blog::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Visa_Formalities->value);
        })->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.services-visa-formalities', compact('travel_transportation', 'nationalities', 'slider', 'travel_services', 'blogs', 'visa_blogs'));

    }

    public function tour_guidance()
    {
        $slider = Slider::query()->where('status', SliderStatus::Services->value)->first();
        $travel_transportation = TravelService::query()->where('status', TravelServiceStatus::Tour_Guidance->value)->first();
        $travel_services = TravelService::query()->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->take(5)->get();

        $guidance_blogs = Blog::whereHas('services', function ($query) {
            $query->where('status', TravelServiceStatus::Tour_Guidance->value);
        })->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.services-tour-guidance', compact('travel_transportation', 'nationalities', 'slider', 'travel_services', 'blogs', 'guidance_blogs'));

    }

    public function hello()
    {
        return 'hello';
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
            $date = $date->checkin_check_out;
            $date = Carbon::parse($date); // Parse the date string
            $date = $date->format('Y-m-d'); // Format it to 'Y-m-d'
            $tours = $tours->whereHas('tour_overviews.tour_overviews_translations', function ($query) use ($date) {
                $query->where('values->start_date', $date)->orWhere('values->end_date', $date); // Adjust this if `days` is actually present
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
        $tours = $tours->get();

        return $tours;

    }
}
