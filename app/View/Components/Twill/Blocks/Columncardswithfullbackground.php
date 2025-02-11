<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Blocks\Block;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Columncardswithfullbackground extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.columncardswithfullbackground');
    }

    public function getForm(): Form
    {
        return Form::make([
            Medias::make()
            ->name('background-image')
            ->label(label: twillTrans('Background Image'))
            ->required()
            ->max(1),
            InlineRepeater::make()->name('texts') 
            ->fields([
                Input::make()
                    ->name(name: 'title')
                    ->required()
                    ->translatable()
            ]) 
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'background-image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                        'minValues' => [
                            'width' => 1440,
                            'height' => 439,
                        ],
                    ],
                ]
            ]
        ];
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Column Cards with Full Background";
    }
}
