<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Fullscreenbanner extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.fullscreenbanner');
    }

    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()
                ->name('content')
                ->label('Content')
                ->toolbarOptions(
                    [
                        ['header' => [2, 3, 4, 5, 6, false]],
                        'bold',
                        'clean',
                    ]
                )
                ->translatable(),
        ]);
    }
}
