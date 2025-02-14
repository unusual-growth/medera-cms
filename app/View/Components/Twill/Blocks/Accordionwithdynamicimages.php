<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Accordionwithdynamicimages extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.accordionwithdynamicimages');
    }

    public function getForm(): Form
    {
        return Form::make([
            InlineRepeater::make()
                ->name('items')
                ->label('Items')
                ->max(6)
                ->fields([
                    Medias::make()
                        ->label('Icons')
                        ->name('icon')
                        ->max(1)
                        ->note('Icon'),
                    Input::make()->name('title')->label('Accordion Item Title')->note('(h4) Will be displayed alongside the icon, as clickable title.')->translatable(),
                    Wysiwyg::make()
                        ->name('content')
                        ->toolbarOptions(['list-unordered', 'bold', 'italic'])
                        ->required()
                        ->allowSource()
                        ->translatable(),
                    Medias::make()
                        ->label('Image')
                        ->name('image')
                        ->max(1)
                        ->note('Image will be displaye on the left side of the section'),
                ]),
        ]);
    }
    public static function getCrops(): array
    {
        return [
            'image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ]
            ],
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
