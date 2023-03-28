<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactMessage;
use App\Http\Controllers\backend\HomeBannerController;
use App\Http\Controllers\backend\LogoController;
use App\Http\Controllers\backend\PartnerController;
use App\Http\Controllers\front\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\SocialMediaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\HomeAboutController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\WeServeController;
use App\Http\Controllers\backend\PrincipaleController;
use App\Http\Controllers\backend\ResumeController;
use App\Http\Controllers\backend\ReviewController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\SkillController;
use App\Http\Controllers\backend\AchievementController;
use App\Http\Controllers\backend\TeamController;
use App\Models\WeServe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventCategoryController;
use App\Models\Achievement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => '/', 'as' => 'front.'], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::match(['get','post'],'/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('clear',  [FrontendController::class, 'clear'])->name('clear');
});

// admin routes
Route::group(['prefix' => '/dashboard', 'as' => 'backend.'], function () {
    Route::resource('/logo', LogoController::class);
    Route::get('/socialmedias', [SocialMediaController::class, 'index'])->name('social.index');
    Route::put('/socialmedias/update/{id}', [SocialMediaController::class, 'update'])->name('social.update');
    Route::get('/socialmedia/status/{id}', [SocialMediaController::class, 'status'])->name('social.status');
    Route::get('general/information', [GeneralController::class, 'generalinformation'])->name('general.info');
    Route::put('general/cv/update', [GeneralController::class, 'cv'])->name('general.cv.update');
    Route::put('general/updateAddress', [GeneralController::class, 'updateAddress'])->name('updateAddress');
    Route::put('general/updateContact', [GeneralController::class, 'updateContact'])->name('updateContact');
    Route::put('general/updateCopyRight', [GeneralController::class, 'updateCopyRight'])->name('updateCopyRight');
    Route::put('general/updateEmail', [GeneralController::class, 'updateEmail'])->name('updateEmail');
    Route::put('general/updateContactInfo', [GeneralController::class, 'updateContactInfo'])->name('updateContactInfo');
    Route::get('general/adminProfile', [GeneralController::class, 'adminProfile'])->name('adminProfile');
    Route::put('general/passwordReset', [GeneralController::class, 'passwordReset'])->name('passwordReset');
    Route::put('general/updateAdminEmail', [GeneralController::class, 'updateAdminEmail'])->name('updateAdminEmail');
    Route::put('general/updateAdminPhoto', [GeneralController::class, 'updateAdminPhoto'])->name('updateAdminPhoto');
    Route::put('general/updateAdminName', [GeneralController::class, 'updateAdminName'])->name('updateAdminName');
    Route::put('general/updatename', [GeneralController::class, 'updatename'])->name('updatename');
    Route::get('partner', [PartnerController::class, 'index'])->name('partner.index');
    Route::post('partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('partner/destroy/{id}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    Route::post('partner/update/{id}', [PartnerController::class, 'update'])->name('partner.update');
    Route::post('partner/update/{id}', [PartnerController::class, 'update'])->name('partner.update');
    Route::get('partner/update/status/{id}', [PartnerController::class, 'status'])->name('partner.status');
    Route::put('meta/update/{id}', [GeneralController::class, 'meta'])->name('meta.update');
    Route::put('calendly/update/{id}', [GeneralController::class, 'calendly'])->name('calendly.update');

    Route::group(['prefix' => '/banner', 'as' => 'banner.'], function () {
        Route::get('/', [HomeBannerController::class, 'index'])->name('index');
        Route::post('update/{id}', [HomeBannerController::class, 'update'])->name('update');
        Route::post('slider', [HomeBannerController::class, 'slider_store'])->name('slider.store');
        Route::put('slider/update/{id}', [HomeBannerController::class, 'slider_update'])->name('slider.update');
        Route::delete('slider/destroy/{id}', [HomeBannerController::class, 'slider_delete'])->name('slider.delete');
        Route::post('title', [HomeBannerController::class, 'title_store'])->name('title.store');
        Route::put('title/update/{id}', [HomeBannerController::class, 'title_update'])->name('title.update');
        Route::delete('title/destroy/{id}', [HomeBannerController::class, 'title_delete'])->name('title.delete');
    });
    //about route
    Route::group(['prefix' => '/about', 'as' => 'about.'], function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::put('/update/{id}', [AboutController::class, 'update'])->name('update');
    });
    Route::resource('service', ServiceController::class);
    Route::resource('resume', ResumeController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('blog', BlogController::class);
    //skill route
    Route::group(['prefix' => '/skill', 'as' => 'skill.'], function () {
        Route::get('/', [SkillController::class, 'index'])->name('index');
        Route::get('/create', [SkillController::class, 'create'])->name('create');
        Route::post('/store', [SkillController::class, 'store'])->name('store');
        Route::put('/update/{id}', [SkillController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [SkillController::class, 'destroy'])->name('destroy');
    });
    //category route
    Route::group(['prefix' => '/category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/status/{id}', [CategoryController::class, 'status'])->name('status');
    });
    //my portfolio route
    Route::group(['prefix' => '/portfolio', 'as' => 'portfolio.'], function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('index');
        Route::post('/store', [PortfolioController::class, 'store'])->name('store');
        Route::put('/update/{id}', [PortfolioController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PortfolioController::class, 'destroy'])->name('destroy');
        Route::get('/status/{id}', [PortfolioController::class, 'status'])->name('status');
    });
    Route::group(['prefix' => '/testimonial', 'as' => 'testimonial.'], function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::post('/store', [TestimonialController::class, 'store'])->name('store');
        Route::get('/destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => '/contact', 'as' => 'contact.'], function () {
        Route::get('/', [ContactMessage::class, 'index'])->name('index');
        Route::get('details/{id}', [ContactMessage::class, 'details'])->name('details');
        Route::get('messages/star/{id}', [ContactMessage::class, 'startstatus'])->name('star.status');
        Route::get('messages/star', [ContactMessage::class, 'star'])->name('star');
        Route::get('messages/unread', [ContactMessage::class, 'unread'])->name('unread');
        Route::get('messages/total_mails', [ContactMessage::class, 'total_mail'])->name('total_mail');
    });
    //Achievement route
    Route::group(['prefix' => '/achievement', 'as' => 'achievement.'], function () {
        Route::get('/', [AchievementController::class, 'index'])->name('index');
        Route::post('/store', [AchievementController::class, 'store'])->name('store');
        Route::put('/update/{id}', [AchievementController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AchievementController::class, 'destroy'])->name('destroy');
    });
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard/user/delete/{id}', [HomeController::class, 'user_delete'])->name('dashboard.user.delete');
