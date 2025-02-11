<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Blocks\Block;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Form;
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
            Medias::make()
                ->name('banner_image')
                ->label('Image')
                ->required()
                ->max(1)
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'banner_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                        'minValues' => [
                            'width' => 1440,
                            'height' => 7523,
                        ],
                    ],
                ]
            ]
        ];
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Full Screen Banner";
    }
}
