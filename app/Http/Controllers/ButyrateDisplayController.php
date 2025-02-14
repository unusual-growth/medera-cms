<?php

namespace App\Http\Controllers;

use App\Models\Butyrate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;


class ButyrateDisplayController extends Controller
{
    use SetsMetadata;

     public function show(Butyrate $butyrate): View|RedirectResponse
     {
        
        if (!$butyrate) {
            abort(404);
        }

        if ($butyrate->redirect) {
                return redirect(route('butyrate', $butyrate->slug));
        }


        $this->setMetadata($butyrate);
        view()->share('item', $butyrate);
        return view('site.butyrate');
    }
    
}
