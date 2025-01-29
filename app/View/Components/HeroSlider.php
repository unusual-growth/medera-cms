<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSlider extends Component
{
    public $dummy_data_active = true;
    public $slides;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->slides = arrayToObject([

            [
                "image" => 'https://via.placeholder.com/1920x1080',
                "heading_type" => 'h1',
                "title" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                "description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                "image" => 'https://via.placeholder.com/1920x1080',
                "heading_type" => 'h1',
                "title" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                "description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                "image" => 'https://via.placeholder.com/1920x1080',
                "heading_type" => 'h1',
                "title" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                "description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-slider');
    }
}
