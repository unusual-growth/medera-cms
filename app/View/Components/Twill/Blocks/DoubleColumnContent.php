<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Radios;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Doublecolumncontent extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.doublecolumncontent');
    }

    public function getForm(): Form
    {
        return Form::make([
            Checkbox::make()
                ->name('image_right')
                ->label('Right Image Position'),
            Checkbox::make()
                ->name('reverse_order_mobile')
                ->label('Reverse Order on Mobile'),
            Radios::make()
                ->name('color_scheme')
                ->inline()
                ->border()
                ->options(
                    Options::make([
                        Option::make('green', 'Green'),
                        Option::make('peach', 'Peach'),
                    ])
                )->default('green'),
            Wysiwyg::make()->name('text')->label('Content')->required()->translatable()
                ->toolbarOptions([
                    ['header' => [2, 3, false]],
                    'strong',
                    'italic',
                    'underline',
                    'link'
                ])->allowSource(true),
            Medias::make()
                ->name('col_image')
                ->label('Image')
                ->required()
                ->max(1)
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'col_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                        'minValues' => [
                            'width' => 643,
                            'height' => 466,
                        ],
                    ],
                ]
            ]
        ];
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Double Column Content";
    }
}
