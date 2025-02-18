<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Gradientbanner extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.gradientbanner');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()->name('title')->label('Title')->note('This field is always H1')->translatable(),
            Input::make()->type('textarea')->name('text')->label('Text')->note('This field is always P')->translatable(),
            Select::make()
                ->name('background')
                ->label('Background')
                ->options([
                    'forest-to-gray' => 'Forest (Greenish-blue) to Gray Gradient',
                    'peach-to-gray' => 'Peach to Gray Gradient',
                    'dark-forest-to-gray' => 'Dark-Forest (Greenish-blue) to Gray Gradient',
                ])
                ->default('forest-to-gray'),
        ]);
    }
}
