<?php

use App\Http\Controllers\Dashboard\GeneralCommentController;
use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\BookingController;
use App\Http\Controllers\Website\CareersController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\DouduoPartnerController;
use App\Http\Controllers\Website\EventController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\MessageController;
use App\Http\Controllers\Website\PrivacyController;
use App\Http\Controllers\Website\QuestionController;
use App\Http\Controllers\Website\SpecialOfferController;
use App\Http\Controllers\Website\TravelServiceController;
use App\Http\Controllers\Website\WorkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login', '\App\Http\Controllers\Dashboard\AuthController@login')->name('login');
Route::get('/set-language/{locale}', function ($locale) {
    abort_unless(in_array($locale, ['zh-Hant', 'zh', 'en'], true), 404);

    session(['website_locale' => $locale]);
    cookie()->queue('website_locale', $locale, 60 * 24 * 365);

    return redirect()->back();
})->name('language.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'Search'])->name('search');
Route::get('/api/search', [\App\Http\Controllers\Website\SearchController::class, 'suggest'])->name('search.suggest');

Route::get('/services', [TravelServiceController::class, 'index'])->name('services');
Route::get('/services-transportation', [TravelServiceController::class, 'transportation_service'])->name('services-transportation');
Route::get('/services-flight-reservation', [TravelServiceController::class, 'flight_reservation'])->name('services-flight-reservation');
Route::get('/services-visa-formalities', [TravelServiceController::class, 'visa_formalities'])->name('services-visa-formalities');
Route::get('/services-tour-guidance', [TravelServiceController::class, 'tour_guidance'])->name('services-tour-guidance');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::post('/message', [MessageController::class, 'store'])->name('message');
Route::post('/send_feedback', [BlogController::class, 'send_feedback'])->name('send_feedback');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::post('/join_our_teams', [CareersController::class, 'join_our_teams'])->name('join_our_teams');
Route::get('/loyalty-program', [SpecialOfferController::class, 'index'])->name('loyalty-program');
Route::get('/tours/{slug?}', [\App\Http\Controllers\Website\TourController::class, 'index'])->name('egypt-tours');
Route::get('/tours/details/{slug}', [\App\Http\Controllers\Website\TourController::class, 'show'])->name('tour_details');
Route::get('privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/how-it-works', [WorkController::class, 'index'])->name('how-it-works');
Route::get('/partner', [DouduoPartnerController::class, 'index'])->name('partner');
Route::get('/blogs', [\App\Http\Controllers\Website\BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog_preview');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/validate-first-form', [BookingController::class, 'validateFirstForm'])->name('validate.first.form');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event_details/{slug}', [EventController::class, 'show'])->name('event_details');
Route::get('/faq', [QuestionController::class, 'index'])->name('faq');
Route::get('/terms', [PrivacyController::class, 'terms'])->name('terms');
Route::get('/tour-search', [\App\Http\Controllers\Website\HomeController::class, 'tour_search'])->name('tour_search');
Route::get('blogs/tag/{tag}', [BlogController::class, 'tag_blogs'])->name('tag_blogs');
Route::get('search_blogs', [BlogController::class, 'search_blogs'])->name('search_blogs');
Route::get('/blogs-destination', [BlogController::class, 'blog_destination'])->name('blogs-destination');
Route::get('/blogs-interest', [BlogController::class, 'blog_interest'])->name('blogs-interest');
Route::get('/blogs-trending', [BlogController::class, 'trending_now'])->name('blogs-trending');

Route::get('/general-comments', [GeneralCommentController::class, 'getComments'])->name('general-comments');

// Route::get('/', function () {
//     return view('front.index');
// })->name('home');
//Route::get('/egypt-tours', function () {
//    return view('front.egypt-tours');
//})->name('egypt-tours');
// Route::get('/services', function () {
//     return view('front.services');
// })->name('services');
//Route::get('/blogs', function () {
//    return view('front.blogs');
//})->name('blogs');
// Route::get('/about', function () {
//     return view('front.about');
// })->name('about');
// Route::get('/loyalty-program', function () {
//     return view('front.loyalty-program');
// })->name('loyalty-program');
// Route::get('/careers', function () {
//     return view('front.careers');
// })->name('careers');

//Route::get('/partner', function () {
//    return view('front.partner');
//})->name('partner');

//Route::get('/services-transportation', function () {
//    return view('front.services-transportation');
//})->name('services-transportation');
//Route::get('/services-flight-reservation', function () {
//    return view('front.services-flight-reservation');
//})->name('services-flight-reservation');
//Route::get('/services-visa-formalities', function () {
//    return view('front.services-visa-formalities');
//})->name('services-visa-formalities');
//Route::get('/services-tour-guidance', function () {
//    return view('front.services-tour-guidance');
//})->name('services-tour-guidance');

//Route::get('/blogs/details/{slug}', function ($slug) {
//    return view('front.blog-preview');
//})->name('blog-preview');
//Route::get('/blogs-destination', function () {
//    return view('front.blogs-destination');
//})->name('blogs-destination');
//Route::get('/blogs-interest', function () {
//    return view('front.blogs-interest');
//})->name('blogs-interest');
//Route::get('/blogs-trending', function () {
//    return view('front.blogs-trending');
//})->name('blogs-trending');
Route::get('/blogs-destination-cairo', function () {
    return view('front.blogs-destination-cairo');
})->name('blogs-destination-cairo');

Route::get('/blogs-interest-art', function () {
    return view('front.blogs-interest-art');
})->name('blogs-interest-art');

Route::get('/event-details', function () {
    return view('front.event-details');
})->name('event-details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//Route::get('/faq', function () {
//    return view('front.faq');
//})->name('faq');
//Route::get('/terms', function () {
//    return view('front.terms');
//})->name('terms');
//Route::get('/privacy', function () {
//    return view('front.privacy');
//})->name('privacy');
