<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\DoudouPartner;
use App\Models\General_setting;
use App\Models\Nationality\Nationality;
use App\Models\Question\Question;
use App\Models\Tour;

class ContactController extends Controller
{
    public function index()
    {
        $siteSettings = General_setting::first();
        $partners = DoudouPartner::query()->latest()->take(10)->get();

        if ($partners->isEmpty()) {
            $partnerAssets = glob(public_path('assets/images/doudou_partner/*.{jpg,jpeg,png,webp}'), GLOB_BRACE) ?: [];
            $partners = collect(array_slice($partnerAssets, 0, 10))->map(function (string $path) {
                return (object) [
                    'image_url' => asset('assets/images/doudou_partner/'.basename($path)),
                ];
            });
        }

        $contactCards = [
            [
                'icon' => 'location',
                'title' => __('front.site.contact.cards.location.title'),
                'value' => $siteSettings?->location ?: $siteSettings?->address ?: __('front.site.contact.cards.location.fallback'),
            ],
            [
                'icon' => 'mail',
                'title' => __('front.site.contact.cards.email.title'),
                'value' => $siteSettings?->email ?: __('front.site.contact.cards.email.fallback'),
            ],
            [
                'icon' => 'phone',
                'title' => __('front.site.contact.cards.phone.title'),
                'value' => $siteSettings?->manager_phone ?: __('front.site.contact.cards.phone.fallback'),
            ],
        ];

        return view('front.contact', [
            'cities' => City::query()->orderBy('id')->get(),
            'nationalities' => Nationality::query()->orderBy('id', 'desc')->take(5)->get(),
            'partners' => $partners,
            'questions' => Question::query()->latest()->take(3)->get(),
            'siteSettings' => $siteSettings,
            'tours' => Tour::query()->get(),
            'contactCards' => $contactCards,
        ]);
    }
}
