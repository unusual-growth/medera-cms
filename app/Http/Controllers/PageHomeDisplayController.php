<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Repositories\HomepageRepository;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageHomeDisplayController extends Controller
{
    use SetsMetadata;
    public function __construct(
        private HomepageRepository $homepageRepository,
    )
    {
    }
    public function show(): View
    {
        LaravelLocalization::setRouteName('home');
        $item = $this->homepageRepository->getHomepage();
        FacadesView::share('item', $item);
        return View('pages.homepage', ['item' => $item]);

        // if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
        //     /** @var \App\Models\Page $frontPage */
        //     $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();

        //     $this->setMetadata($frontPage);

        //     if ($frontPage->published) {
        //         FacadesView::share('item', $frontPage);

        //         return view('site.page', ['key'=>"home"]);
        //     }
        // }

        abort(404);
    }
}
