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
                ->name('desktop_image')
                ->label('Banner Image')
                ->max(1)
                ->fieldNote('This image will be displayed behind the content in desktop devices, on the right column.'),
            Medias::make()
                ->name('tablet_image')
                ->label('Banner Image')

                ->max(1)
                ->fieldNote('This image will be displayed behind the content in tablet devices on the right column.'),
            Medias::make()
                ->name('mobile_image')
                ->label('Background Image')
                ->max(1)
                ->fieldNote('This image will be displayed behind the content in mobile devices, under the text.'),
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'desktop_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'tablet_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
            'mobile_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ]
        ];
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Full Screen Banner";
    }
}
