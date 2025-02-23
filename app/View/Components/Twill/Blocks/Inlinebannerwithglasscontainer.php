<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Services\Twill\Forms\CollapsibleContainer;
use Illuminate\Contracts\View\View;

class Inlinebannerwithglasscontainer extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.inlinebannerwithglasscontainer');
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
            CollapsibleContainer::make()
                ->label('Background Images')
                ->fields([
                    Medias::make()
                        ->name('desktop_image')
                        ->label('Background Image')
                        ->max(1)
                        ->fieldNote('This image will be displayed behind the content in desktop devices.'),
                    Medias::make()
                        ->name('tablet_image')
                        ->label('Background Image')
                        ->max(1)
                        ->fieldNote('This image will be displayed behind the content in tablet devices.'),
                    Medias::make()
                        ->name('mobile_image')
                        ->label('Background Image')
                        ->max(1)
                        ->fieldNote('This image will be displayed behind the content in mobile devices.'),
                ]),
            CollapsibleContainer::make()
                ->label('Link (Button)')
                ->fields([
                    Input::make()
                        ->name('link_text')
                        ->label('Link Text')
                        ->translatable(),

                    Input::make()
                        ->type('url')
                        ->name('link_url')
                        ->label('Link URL')
                        ->translatable(),
                ]),
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
        return 'Inline Banner with Glass Container';
    }
}
