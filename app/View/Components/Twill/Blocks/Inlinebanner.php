<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Services\Twill\Forms\CollapsibleContainer;
use Illuminate\Contracts\View\View;


class Inlinebanner extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.inlinebanner');
    }

    public function getForm(): Form
    {
        return Form::make([
            Select::make()
                ->name('background')
                ->label('Background')
                ->options(
                    Options::make([
                        Option::make('peach-gray', 'Peach to Gray Gradient'),
                        Option::make('forest-peach', 'Forest (Greenish-blue) to Peach Gradient'),

                    ])
                )
                ->default('default'),
            Checkbox::make()
                ->name('has_background_image')
                ->label('Does this banner have a background image?'),
            Checkbox::make()
                ->name('has_link')
                ->label('Does this banner have a link?'),
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
                ->connectedTo('has_background_image', true)
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
                ->connectedTo('has_link', true)
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
        return 'Inline Banner';
    }
}
