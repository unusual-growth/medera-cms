<?php

namespace App\Http\Controllers;

use App\Models\Butyrate;
use App\Models\HowWeWork;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;


class HowWeWorkDisplayController extends Controller
{
    use SetsMetadata;

     public function show(HowWeWork $howWeWork): View|RedirectResponse
     {

        if (!$howWeWork) {
            abort(404);
        }

        if ($howWeWork->redirect) {
                return redirect(route('butyrate', $howWeWork->slug));
        }


        $this->setMetadata($howWeWork);
        view()->share('item', $howWeWork);
        return view('site.page');
    }

}
