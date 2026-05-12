<?php

use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\BlogGallaryController;
use App\Http\Controllers\Dashboard\BookingController;
use App\Http\Controllers\Dashboard\CarrersController;
use App\Http\Controllers\Dashboard\DouduoPartnerController;
use App\Http\Controllers\Dashboard\GallaryPackageController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\PopularVideoController;
use App\Http\Controllers\Dashboard\PrivacyController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SpecialOfferController;
use App\Http\Controllers\Dashboard\TermController;
use App\Http\Controllers\Dashboard\TravelServiceController;
use App\Http\Controllers\Dashboard\WorkController;
use App\Http\Controllers\NationalityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::post('/dashboard/toggle-menu', [MenuController::class, 'toggleMenu'])->name('dashboard.toggle-menu');

//############################ Admin Route ###########################################
Route::group(['middleware' => 'guest:admin', 'prefix' => 'cp_admins'], function () {
    Route::get('login', '\App\Http\Controllers\Dashboard\AuthController@login')->name('login.admin');
    Route::post('postuser', '\App\Http\Controllers\Dashboard\AuthController@postlogin')->name('admin.login');
});
Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    //########################## Admin after auth ######################################
    Route::group(['prefix' => 'cp_admins', 'middleware' => 'auth:admin'], function () {
        // Community Gallery (admin)
        Route::name('admin.')->group(function () {
            Route::patch('community-posts/{communityPost}/toggle', [\App\Http\Controllers\Admin\CommunityPostController::class, 'toggleActive'])->name('community-posts.toggle');
            Route::post('community-posts/reorder', [\App\Http\Controllers\Admin\CommunityPostController::class, 'reorder'])->name('community-posts.reorder');
            Route::resource('community-posts', \App\Http\Controllers\Admin\CommunityPostController::class)->except(['show']);
        });

        Route::get('/', '\App\Http\Controllers\Dashboard\AdminDashboard@index')->name('admin_dashboard'); //home of dashboard
        Route::post('/updateSession', '\App\Http\Controllers\Dashboard\AdminDashboard@updateSession')->name('update.session'); //home of dashboard
        Route::get('MarkAsRead_all', '\App\Http\Controllers\Dashboard\AdminDashboard@MarkAsRead_all')->name('MarkAsRead_all');

        Route::get('logout', '\App\Http\Controllers\Dashboard\AuthController@logout')->name('admin.logout'); //logout
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', '\App\Http\Controllers\Dashboard\ProfileController@editProfile')->name('edit.profile');
            Route::put('update', '\App\Http\Controllers\Dashboard\ProfileController@updateprofile')->name('update.profile');
            Route::get('edit_password', '\App\Http\Controllers\Dashboard\ProfileController@change_password')->name('admin.change_password');
            Route::put('update_password', '\App\Http\Controllers\Dashboard\ProfileController@update_password')->name('admin.update_password');
        });

        //####################### general settings######################################
        Route::resource('settings', \App\Http\Controllers\Dashboard\GeneralSettingController::class);
        Route::resource('SocialSettings', \App\Http\Controllers\Dashboard\SocialSettingController::class);

        //####################### Social settings######################################
        Route::group(['prefix' => 'Socials'], function () {
            Route::get('/edit', '\App\Http\Controllers\Dashboard\SocialsettingController@edit')->name('Social_settings.edit');
            Route::post('/update/{id}', '\App\Http\Controllers\Dashboard\SocialsettingController@update')->name('Social_settings.update');
        });
        //################################# end Social settings    #######################################
        //################################# roles ######################################
        Route::controller(\App\Http\Controllers\Dashboard\RolesController::class)->prefix('roles')->group(function () {
            Route::get('/', 'RolesController@index')->name('admin.roles.index');
            Route::get('/', 'index')->name('roles.index');
            Route::get('create', 'create')->name('roles.create');
            Route::post('store', 'saveRole')->name('roles.store');
            Route::get('/edit/{id}', 'edit')->name('roles.edit');
            Route::post('update/{id}', 'update')->name('roles.update');
            Route::get('/delete/{id}', 'destroy')->name('roles.destroy');
        });
        //################################# end roles ######################################
        //################################# Users of Dashboard ######################################
        Route::controller(\App\Http\Controllers\Dashboard\UsersDasboardController::class)->prefix('users_dashboard')->group(function () {
            Route::get('/', 'index')->name('users.Dashboard.index');
            Route::get('/create', 'create')->name('users.Dashboard.create');
            Route::post('/store', 'store')->name('users.Dashboard.store');
            Route::get('/edit/{id}', 'edit')->name('users.Dashboard.edit');
            Route::post('update/{id}', 'update')->name('users.Dashboard.update');
            Route::get('/delete/{id}', 'destroy')->name('users.Dashboard.destroy');
        });
        Route::controller(\App\Http\Controllers\Dashboard\CategoryController::class)->prefix('categories')->group(function () {
            Route::get('/', 'index')->name('categories.index');
            Route::get('/create', 'create')->name('categories.create');
            Route::post('store', 'store')->name('categories.store');
            Route::get('/edit/{id}', 'edit')->name('categories.edit');
            Route::post('update/{id}', 'update')->name('categories.update');
            Route::get('/delete/{id}', 'delete')->name('categories.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\TipController::class)->prefix('tips')->group(function () {
            Route::get('/', 'index')->name('tips.index');
            Route::get('/create', 'create')->name('tips.create');
            Route::post('store', 'store')->name('tips.store');
            Route::get('/edit/{id}', 'edit')->name('tips.edit');
            Route::post('update/{id}', 'update')->name('tips.update');
            Route::get('/delete/{id}', 'delete')->name('tips.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\CityController::class)->prefix('cities')->group(function () {
            Route::get('/', 'index')->name('cities.index');
            Route::get('/create', 'create')->name('cities.create');
            Route::post('store', 'store')->name('cities.store');
            Route::get('/edit/{id}', 'edit')->name('cities.edit');
            Route::post('update/{id}', 'update')->name('cities.update');
            Route::get('/delete/{id}', 'delete')->name('cities.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\ExclusionController::class)->prefix('exclusions')->group(function () {
            Route::get('/', 'index')->name('exclusions.index');
            Route::get('/create', 'create')->name('exclusions.create');
            Route::post('store', 'store')->name('exclusions.store');
            Route::get('/edit/{id}', 'edit')->name('exclusions.edit');
            Route::post('update/{id}', 'update')->name('exclusions.update');
            Route::get('/delete/{id}', 'delete')->name('exclusions.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\InclusionController::class)->prefix('inclusions')->group(function () {
            Route::get('/', 'index')->name('inclusions.index');
            Route::get('/create', 'create')->name('inclusions.create');
            Route::post('store', 'store')->name('inclusions.store');
            Route::get('/edit/{id}', 'edit')->name('inclusions.edit');
            Route::post('update/{id}', 'update')->name('inclusions.update');
            Route::get('/delete/{id}', 'delete')->name('inclusions.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\TourTypeController::class)->prefix('tour_type')->group(function () {
            Route::get('/', 'index')->name('tour_type.index');
            Route::get('/create', 'create')->name('tour_type.create');
            Route::post('store', 'store')->name('tour_type.store');
            Route::get('/edit/{id}', 'edit')->name('tour_type.edit');
            Route::post('update/{id}', 'update')->name('tour_type.update');
            Route::get('/delete/{id}', 'delete')->name('tour_type.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\TourGroupController::class)->prefix('tour_group')->group(function () {
            Route::get('/', 'index')->name('tour_group.index');
            Route::get('/create', 'create')->name('tour_group.create');
            Route::post('store', 'store')->name('tour_group.store');
            Route::get('/edit/{id}', 'edit')->name('tour_group.edit');
            Route::post('update/{id}', 'update')->name('tour_group.update');
            Route::get('/delete/{id}', 'delete')->name('tour_group.delete');

        });

        Route::controller(\App\Http\Controllers\Dashboard\TourController::class)->prefix('tours')->group(function () {
            Route::get('/', 'index')->name('tours.index');
            Route::get('/create', 'create')->name('tours.create');
            Route::post('store', 'store')->name('tours.store');
            Route::get('/edit/{id}', 'edit')->name('tours.edit');
            Route::post('update/{id}', 'update')->name('tours.update');
            Route::get('/delete/{id}', 'delete')->name('tours.delete');
            Route::get('options/{id}', 'options'); // ajax of options of countries

        });
        Route::controller(\App\Http\Controllers\Dashboard\GallaryController::class)->prefix('tours/galleries')->group(function () {

            Route::get('/{id}', '\App\Http\Controllers\Dashboard\GallaryController@index')->name('gallary.index');
            Route::post('/update/', '\App\Http\Controllers\Dashboard\GallaryController@update')->name('gallary.update');
            Route::post('storegallary', '\App\Http\Controllers\Dashboard\GallaryController@storegallary')->name('gallary.storegallary');
            Route::get('/delete/{id}', '\App\Http\Controllers\Dashboard\GallaryController@destroy')->name('gallary.destroy');
        });
        Route::controller(\App\Http\Controllers\Dashboard\TourController::class)->prefix('tours/iterations')->group(function () {
            Route::get('/{id}', 'iteration')->name('tours.iterations'); // ajax of options of countries
            Route::post('update', 'iteration_update')->name('iteration.update'); // ajax of options of countries

        });
        Route::controller(\App\Http\Controllers\Dashboard\CommentController::class)->prefix('tours/comments')->group(function () {
            Route::get('/{id}', 'create')->name('comments.create'); // ajax of options of countries
            Route::post('store', 'store')->name('comments.store'); // ajax of options of countries
            Route::post('update/{id}', 'update')->name('comments.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('comments.delete');
        });
        //##############################
        Route::controller(\App\Http\Controllers\Dashboard\Events\EventController::class)->prefix('events')->group(function () {
            Route::get('/', 'index')->name('events.index');
            Route::get('/create', 'create')->name('events.create');
            Route::post('store', 'store')->name('events.store');
            Route::get('/edit/{id}', 'edit')->name('events.edit');
            Route::post('update/{id}', 'update')->name('events.update');
            Route::get('/delete/{id}', 'delete')->name('events.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\Events\GallaryEventController::class)->prefix('events/galleries')->group(function () {

            Route::get('/{id}', 'index')->name('events.gallary.index');
            Route::post('/update/', 'update')->name('events.gallary.update');
            Route::post('storegallary', 'storegallary')->name('events.gallary.storegallary');
            Route::get('/delete/{id}', 'destroy')->name('events.gallary.destroy');
        });
        Route::controller(\App\Http\Controllers\Dashboard\Events\EventController::class)->prefix('events/iterations')->group(function () {
            Route::get('/{id}', 'iteration')->name('events.iterations'); // ajax of options of countries
            Route::post('update', 'iteration_update')->name('events.iterations.update'); // ajax of options of countries

        });
        Route::controller(\App\Http\Controllers\Dashboard\Events\InformationController::class)->prefix('events/informations')->group(function () {
            Route::get('/{id}', 'create')->name('events.information.create'); // ajax of options of countries
            Route::post('store', 'store')->name('events.information.store'); // ajax of options of countries
            Route::post('update/{id}', 'update')->name('events.information.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('events.information.delete');
        });

        //#############################33

        Route::controller(SliderController::class)->prefix('slider')->group(function () {
            Route::get('/', 'index')->name('slider.index');
            Route::get('/create', 'create')->name('slider.create');
            Route::post('store', 'store')->name('slider.store');
            Route::get('/edit/{id}', 'edit')->name('slider.edit');
            Route::put('update/{id}', 'update')->name('slider.update');
            Route::get('/delete/{id}', 'delete')->name('slider.delete');

        });

        Route::controller(ServiceController::class)->prefix('services')->group(function () {
            Route::get('/', 'index')->name('services.index');
            Route::get('/create', 'create')->name('services.create');
            Route::post('store', 'store')->name('services.store');
            Route::get('/edit/{id}', 'edit')->name('services.edit');
            Route::put('update/{id}', 'update')->name('services.update');
            Route::get('/delete/{id}', 'delete')->name('services.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\HotelController::class)->prefix('hotels')->group(function () {
            Route::get('/', 'index')->name('hotels.index');
            Route::get('/create', 'create')->name('hotels.create');
            Route::post('store', 'store')->name('hotels.store');
            Route::get('/edit/{id}', 'edit')->name('hotels.edit');
            Route::put('update/{id}', 'update')->name('hotels.update');
            Route::get('/delete/{id}', 'delete')->name('hotels.delete');

        });

        Route::controller(PopularVideoController::class)->prefix('popular_videos')->group(function () {
            Route::get('/', 'index')->name('popular_video.index');
            Route::get('/create', 'create')->name('popular_video.create');
            Route::post('store', 'store')->name('popular_video.store');
            Route::get('/edit/{id}', 'edit')->name('popular_video.edit');
            Route::put('update/{id}', 'update')->name('popular_video.update');
            Route::get('/delete/{id}', 'delete')->name('popular_video.delete');

        });

        Route::controller(BlogController::class)->prefix('blogs')->group(function () {
            Route::get('/', 'index')->name('blogs.index');
            Route::get('/create', 'create')->name('blogs.create');
            Route::post('store', 'store')->name('blogs.store');
            Route::get('/edit/{id}', 'edit')->name('blogs.edit');
            Route::put('update/{id}', 'update')->name('blogs.update');
            Route::get('/delete/{id}', 'delete')->name('blogs.delete');

        });

        Route::controller(QuestionController::class)->prefix('questions')->group(function () {
            Route::get('/', 'index')->name('questions.index');
            Route::get('/create', 'create')->name('questions.create');
            Route::post('store', 'store')->name('questions.store');
            Route::get('/edit/{id}', 'edit')->name('questions.edit');
            Route::put('update/{id}', 'update')->name('questions.update');
            Route::get('/delete/{id}', 'delete')->name('questions.delete');

        });

        Route::controller(GallaryPackageController::class)->prefix('gallary_packages')->group(function () {
            Route::get('/', 'index')->name('gallary_packages.index');
            Route::post('/update', 'update')->name('gallary_packages.update');
            Route::post('/storegallary', 'storegallary')->name('gallary_packages.storegallary');
            Route::get('/delete/{id}', 'destroy')->name('gallary_packages.destroy');

        });

        Route::controller(AboutUsController::class)->prefix('about_us')->group(function () {
            Route::get('/', 'index')->name('about_us.index');
            Route::get('/create', 'create')->name('about_us.create');
            Route::post('store', 'store')->name('about_us.store');
            Route::get('/edit/{id}', 'edit')->name('about_us.edit');
            Route::put('update/{id}', 'update')->name('about_us.update');
            Route::get('/delete/{id}', 'delete')->name('about_us.delete');

        });

        Route::controller(MessageController::class)->prefix('message')->group(function () {
            Route::get('/{not_id?}', 'index')->name('message.index');
            Route::get('/delete/{id}', 'delete')->name('message.delete');

        });
        Route::controller(\App\Http\Controllers\Dashboard\JoinOurTeamController::class)->prefix('join_teams')->group(function () {
            Route::get('/{not_id?}', 'index')->name('join_teams.index');
            Route::get('/delete/{id}', 'delete')->name('join_teams.delete');

        });

        Route::controller(CarrersController::class)->prefix('careers')->group(function () {
            Route::get('/', 'index')->name('careers.index');
            Route::get('/create', 'create')->name('careers.create');
            Route::post('store', 'store')->name('careers.store');
            Route::get('/edit/{id}', 'edit')->name('careers.edit');
            Route::put('update/{id}', 'update')->name('careers.update');
            Route::get('/delete/{id}', 'delete')->name('careers.delete');

        });

        Route::controller(TravelServiceController::class)->prefix('travel_service')->group(function () {
            Route::get('/', 'index')->name('travel_service.index');
            Route::get('/create', 'create')->name('travel_service.create');
            Route::post('store', 'store')->name('travel_service.store');
            Route::get('/edit/{id}', 'edit')->name('travel_service.edit');
            Route::put('update/{id}', 'update')->name('travel_service.update');
            Route::get('/delete/{id}', 'delete')->name('travel_service.delete');

        });

        Route::controller(SpecialOfferController::class)->prefix('special_offer')->group(function () {
            Route::get('/', 'index')->name('special_offer.index');
            Route::get('/create', 'create')->name('special_offer.create');
            Route::post('store', 'store')->name('special_offer.store');
            Route::get('/edit/{id}', 'edit')->name('special_offer.edit');
            Route::put('update/{id}', 'update')->name('special_offer.update');
            Route::get('/delete/{id}', 'delete')->name('special_offer.delete');

        });

        Route::controller(PrivacyController::class)->prefix('privacy')->group(function () {
            Route::get('/', 'index')->name('privacy.index');
            Route::get('/create', 'create')->name('privacy.create');
            Route::post('store', 'store')->name('privacy.store');
            Route::get('/edit/{id}', 'edit')->name('privacy.edit');
            Route::put('update/{id}', 'update')->name('privacy.update');
            Route::get('/delete/{id}', 'delete')->name('privacy.delete');

        });

        Route::controller(WorkController::class)->prefix('work')->group(function () {
            Route::get('/', 'index')->name('work.index');
            Route::get('/create', 'create')->name('work.create');
            Route::post('store', 'store')->name('work.store');
            Route::get('/edit/{id}', 'edit')->name('work.edit');
            Route::put('update/{id}', 'update')->name('work.update');
            Route::get('/delete/{id}', 'delete')->name('work.delete');

        });

        Route::controller(PartnerController::class)->prefix('partner')->group(function () {
            Route::get('/', 'index')->name('partner.index');
            Route::get('/create', 'create')->name('partner.create');
            Route::post('store', 'store')->name('partner.store');
            Route::get('/edit/{id}', 'edit')->name('partner.edit');
            Route::put('update/{id}', 'update')->name('partner.update');
            Route::get('/delete/{id}', 'delete')->name('partner.delete');

        });

        Route::controller(DouduoPartnerController::class)->prefix('doudou_partner')->group(function () {
            Route::get('/', 'index')->name('doudou_partner.index');
            Route::post('/update', 'update')->name('doudou_partner.update');
            Route::post('/storegallary', 'storegallary')->name('doudou_partner.storegallary');
            Route::get('/delete/{id}', 'destroy')->name('doudou_partner.destroy');

        });

        Route::controller(TermController::class)->prefix('term')->group(function () {
            Route::get('/', 'index')->name('term.index');
            Route::get('/create', 'create')->name('term.create');
            Route::post('store', 'store')->name('term.store');
            Route::get('/edit/{id}', 'edit')->name('term.edit');
            Route::put('update/{id}', 'update')->name('term.update');
            Route::get('/delete/{id}', 'delete')->name('term.delete');

        });

        Route::controller(BlogGallaryController::class)->prefix('gallary_blog')->group(function () {
            Route::get('/{id}', 'index')->name('gallary_blog.index');
            Route::post('/update', 'update')->name('gallary_blog.update');
            Route::post('/storegallary', 'storegallary')->name('gallary_blog.storegallary');
            Route::get('/delete/{id}', 'destroy')->name('gallary_blog.destroy');

        });

        Route::controller(BookingController::class)->prefix('booking')->group(function () {
            Route::get('/{not_id?}', 'index')->name('booking.index');
            Route::get('/delete/{id}', 'delete')->name('booking.delete');

        });

        Route::controller(\App\Http\Controllers\Dashboard\BlogCommentController::class)->prefix('blog/comments')->group(function () {
            Route::get('/{id}', 'create')->name('blog.comments.create'); // ajax of options of countries
            Route::post('store', 'store')->name('blog.comments.store'); // ajax of options of countries
            Route::post('update/{id}', 'update')->name('blog.comments.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('blog.comments.delete');
        });

        Route::controller(\App\Http\Controllers\Dashboard\BlogPragraphController::class)->prefix('blog/pragraph')->group(function () {
            Route::get('/{id}', 'create')->name('blog.pragraph.create'); // ajax of options of countries
            Route::post('store', 'store')->name('blog.pragraph.store'); // ajax of options of countries
            Route::post('update/{id}', 'update')->name('blog.pragraph.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('blog.pragraph.delete');
        });

        Route::controller(\App\Http\Controllers\Dashboard\PragraphDetailsController::class)->prefix('blog/pragraph/details')->group(function () {
            Route::get('/show/{id}', 'show')->name('blog.pragraph.details.show'); // ajax of options of countries
            Route::get('/{id}', 'create')->name('blog.pragraph.details.create'); // ajax of options of countries
            Route::post('store/{id}', 'store')->name('blog.pragraph.details.store'); // ajax of options of countries
            Route::get('edit/{id}', 'edit')->name('blog.pragraph.details.edit'); // ajax of options of countries
            Route::put('update/{id}', 'update')->name('blog.pragraph.details.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('blog.pragraph.details.delete');
        });

        Route::controller(\App\Http\Controllers\Dashboard\BlogSubHeadController::class)->prefix('blog/sub_head')->group(function () {
            Route::get('/{id}', 'create')->name('blog.sub_head.create'); // ajax of options of countries
            Route::post('store', 'store')->name('blog.sub_head.store'); // ajax of options of countries
            Route::post('update/{id}', 'update')->name('blog.sub_head.update'); // ajax of options of countries
            Route::get('delete/{id}', 'delete')->name('blog.sub_head.delete');
        });

        Route::controller(\App\Http\Controllers\Dashboard\BlogCategoryController::class)->prefix('blog_categories')->group(function () {
            Route::get('/', 'index')->name('blog_categories.index');
            Route::get('/create', 'create')->name('blog_categories.create');
            Route::post('store', 'store')->name('blog_categories.store');
            Route::get('/edit/{id}', 'edit')->name('blog_categories.edit');
            Route::post('update/{id}', 'update')->name('blog_categories.update');
            Route::get('/delete/{id}', 'delete')->name('blog_categories.delete');

        });

        Route::controller(\App\Http\Controllers\Dashboard\TagController::class)->prefix('tag')->group(function () {
            Route::get('/', 'index')->name('tag.index');
            Route::get('/create', 'create')->name('tag.create');
            Route::post('store', 'store')->name('tag.store');
            Route::get('/edit/{id}', 'edit')->name('tag.edit');
            Route::put('update/{id}', 'update')->name('tag.update');
            Route::get('/delete/{id}', 'delete')->name('tag.delete');

        });

        Route::controller(\App\Http\Controllers\Dashboard\GeneralCommentController::class)->prefix('general_comments')->group(function () {
            Route::get('/', 'index')->name('general_comments.index');
            Route::get('/create', 'create')->name('general_comments.create');
            Route::post('store', 'store')->name('general_comments.store');
            Route::get('/edit/{id}', 'edit')->name('general_comments.edit');
            Route::put('update/{id}', 'update')->name('general_comments.update');
            Route::get('/delete/{id}', 'delete')->name('general_comments.delete');

        });

        Route::controller(NationalityController::class)->prefix('nationalities')->group(function () {
            Route::get('/', 'index')->name('nationalities.index');
            Route::get('/create', 'create')->name('nationalities.create');
            Route::post('store', 'store')->name('nationalities.store');
            Route::get('/edit/{id}', 'edit')->name('nationalities.edit');
            Route::post('update/{id}', 'update')->name('nationalities.update');
            Route::get('/delete/{id}', 'delete')->name('nationalities.delete');

        });

        // Translation Manager
        Route::controller(\App\Http\Controllers\Dashboard\TranslationController::class)
            ->prefix('translations')
            ->name('translations.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('{locale}/{file}', 'edit')->where('file', '.*')->name('edit');
                Route::post('{locale}/{file}', 'update')->where('file', '.*')->name('update');
                Route::post('{locale}/{file}/auto-fill', 'autoFill')->where('file', '.*')->name('auto-fill');
            });

    });
});
