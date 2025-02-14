<?php

namespace App\Http\Controllers;

use App\Models\Whoweare;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;


class WhoweareDisplayController extends Controller
{
    use SetsMetadata;

     public function show(Whoweare $whoweare): View|RedirectResponse
     {
        if (!$whoweare) {
            abort(404);
        }

        if ($whoweare->redirect) {
                return redirect(route('whoweare', $whoweare->slug));
        }

        $this->setMetadata($whoweare);
        view()->share('item', $whoweare);
        return view('site.whoweare');
    }
    
}
