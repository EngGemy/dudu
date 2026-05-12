<?php

namespace App\Http\Controllers\Website;

use App\Enum\CarrersStatus;
use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinOurTeamRequest;
use App\Models\Admin;
use App\Models\Career\Career;
use App\Models\City;
use App\Models\General_setting;
use App\Models\Hotel\Hotel;
use App\Models\JoinOurTeam;
use App\Models\Nationality\Nationality;
use App\Models\Question\Question;
use App\Models\Slider\Slider;
use App\Models\Tour;

class CareersController extends Controller
{
    public function index()
    {
        $cities = City::query()->get();
        $hotels = Hotel::query()->orderBy('id')->get();

        $questions = Question::query()->orderBy('id', 'desc')->take(4)->get();
        $settings = General_setting::query()->first();
        $career_body = Career::query()->where('status', CarrersStatus::Body->value)->first();
        //        $career_header = Career::query()->where('status', CarrersStatus::Header->value)->first();
        $career_header = Slider::query()->where('status', SliderStatus::Careers->value)->first();
        $tours = Tour::where('publish', 1)->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.careers', compact('cities', 'nationalities', 'tours', 'questions', 'settings', 'career_body', 'career_header', 'hotels'));
    }

    public function join_our_teams(JoinOurTeamRequest $request)
    {
        $data = $request->validated();
        unset($data['resume']);
        $data['resume'] = upload_pdf($request->resume, 'resume');
        $join = JoinOurTeam::create($data);
        $user = $join->id;
        $title = 'New Join';
        $admins = Admin::get();
        $not_type = 'join';
        \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\Memberacoount($user, $title, $not_type));

        return response()->json([
            'status' => 'success',
            'res' => 'Resume Uploaded Successfully',
            'full_message' => 'Your CV has been sent to us successfully, We will contact you soon
                               Have a nice day',
            'message_header' => 'Resume Uploaded Successfully',
            'message_icon' => './assets/images/icons/approve.png',
        ]);

    }
}
