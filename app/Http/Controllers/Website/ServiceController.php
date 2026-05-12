<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Nationality\Nationality;
use App\Models\Service\Service;
use App\Models\Tour;

class ServiceController extends Controller
{
    public function index()
    {
        $servises = Service::query()->orderBy('id', 'desc')->get();
        $tours = Tour::query()->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.services', compact('servises', 'nationalities', 'tours'));

    }
}
