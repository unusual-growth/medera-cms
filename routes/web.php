<?php

use App\Http\Controllers\PageDisplayController;
use App\Http\Controllers\PageHomeDisplayController;
use App\Http\Controllers\ArticleDisplayController;
use App\Http\Controllers\CompanyEstablishmentDisplayController;
use App\Http\Controllers\EmployerServiceDisplayController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Route::controller(FormController::class)->group(function () {
//     Route::post('/submit-request', 'submitRequestForm')->name('submit-request');
//     Route::post('/submit-newsletter', 'newsletter')->name('submit-newsletter');

// });
// Route::get('sitemap.xml', [SitemapController::class, 'sitemap']);
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        //!TODO: 'redirect',
        //!TODO: 'noIndexNoFollow',
        'localize',  'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get(LaravelLocalization::transRoute('routes.home'), [PageHomeDisplayController::class, 'show'])->name('home');
    Route::get('/', [\App\Http\Controllers\PageHomeDisplayController::class, 'show'])->name('frontend.home');
    Route::get(LaravelLocalization::transRoute('routes.page'), [PageDisplayController::class, 'show'])->name('page');
    // Route::get(LaravelLocalization::transRoute('routes.success'), [PageDisplayController::class, 'success'])->name('success');
    // Route::get(LaravelLocalization::transRoute('routes.articles'), [ArticleDisplayController::class, 'index'])->name('articles');
    // Route::get(LaravelLocalization::transRoute('routes.article'), [ArticleDisplayController::class, 'show'])->name('article');
    // Route::get(LaravelLocalization::transRoute('routes.page'), [PageDisplayController::class, 'show'])->name('page');
    // Route::get(LaravelLocalization::transRoute('routes.companyEstablishment'), [CompanyEstablishmentDisplayController::class, 'show'])->name('companyEstablishment');
    // Route::get(LaravelLocalization::transRoute('routes.employerService'), [EmployerServiceDisplayController::class, 'show'])->name('employerService');
    // Route::get(LaravelLocalization::transRoute('routes.success'), [PageDisplayController::class, 'success'])->name('success');
});


Route::get('/for-all-beings', function () {
    return view('for-all-beings');
});
Route::get('/drcaps', function () {
    return view('drcaps');
});
Route::get('/for-humans', function () {
    return view('for-humans');
});
Route::get('/sustainability', function () {
    return view('sustainability');
});
Route::get('/packaging', function () {
    return view('packaging');
});
