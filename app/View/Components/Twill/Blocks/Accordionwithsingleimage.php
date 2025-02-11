<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Columns;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Accordionwithsingleimage extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.accordionwithsingleimage');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()->name('title')->label('Section Title (h2)')->note('Will be displayed on the top and in the middle of the section')->translatable(),
            Medias::make()
            ->name('image')
            ->label('Image')
            ->required()
            ->max(1),
                InlineRepeater::make()->name('accordion-items')
                    ->fields([
                        Medias::make()
                            ->name('icon')
                            ->label(label: twillTrans('Icon'))
                            ->required()
                            ->max(1),
                        Input::make()->name('title')->label('Accordion Item Title')->note('(h4) Will be displayed alongside the icon, as clickable titleasndmj')->translatable(),
                        Wysiwyg::make()
                            ->name('content')
                            ->maxLength(100)
                            ->required()
                            ->allowSource()
                            ->translatable(),

                    ])
        ]);
    }
    public static function getCrops(): array
    {
        return [
            'icon' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1 / 1,
                    ],
                ]
            ]
        ];
    }

}
