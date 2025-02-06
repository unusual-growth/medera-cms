<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use App\Repositories\PageRepository;
use Illuminate\Http\RedirectResponse;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View as FacadesView;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageDisplayController extends Controller
{
    use SetsMetadata;

     public function show(Page $page): View|RedirectResponse
   {
        if (!$page) {
            abort(404);
        }

        if ($page->redirect) {
                return redirect(route('page', $page->slug));
        }


        $this->setMetadata($page);
        view()->share('item', $page);
        return view('site.page');
    }
    public function success() {

        $contents = FacadesView::make(env('APP_TEMPLATE').'.page.success');
        $response = Response::make($contents, 200);
        $response->header('X-Robots-Tag', 'noindex, nofollow');
        return $response;
        // return view(env('APP_TEMPLATE').'.page.success');
    }
}
