<?php

namespace App\View\Components;

use App\Models\Menulink;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $location;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($location = "header",$type = "desktop")
    {
        app()->getLocale();
        $this->location = $location;
        $this->type = $type;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {

        /** @var Menulink[] $links */
        $links = Menulink::published()->where('location',$this->location)->orderBy('position')->get()->toTree();
        if($this->type == 'mobile'){
            // dd($links->pluck('title'));
            // $links = $links->toFlatTree();
        }
        return view('components.menu', ['links' => $links,'type' => $this->type, 'location' => $this->location]);
    }
}
