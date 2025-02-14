<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class Featuredblogs extends TwillBlockComponent
{
    public Collection $blogs;
    public function render(): View
    {
        switch($this->block->input('type')){
            case 'latest':
                $this->blogs = Article::latest()->take(3)->get();
                break;
            case 'random':
            default:
                $this->blogs = Article::inRandomOrder()->take(3)->get();
                break;
        }

        return view('components.twill.blocks.featuredblogs', [
            'blogs' => $this->blogs,
        ]);
    }

    public function getForm(): Form
    {
        return Form::make([
            // Input::make()->name('title'),
            // Input::make()->name('sub_title'),
            Select::make()
                ->name('type')
                ->label('How should the featured blogs get retrieved?')
                ->options(Options::make([
                    Option::make('random', 'Get Random Articles'),
                    Option::make('latest', 'Get Latest Articles'),
                ])
            )
            ->default('random'),
        ]);
    }
}
