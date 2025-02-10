<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Services\Twill\Forms\CollapsibleContainer;
use Illuminate\Contracts\View\View;

class Banner extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.banner');
    }

    public function getForm(): Form
    {
        return Form::make([
            Select::make()
                ->name('background')
                ->label('Background')
                ->options([
                    'forest-to-gray' => 'Forest (Greenish-blue) to Gray Gradient',
                    'peach-gray' => 'Peach to Gray Gradient',
                    'dark-forest-to-gray' => 'Dark-Forest (Greenish-blue) to Gray Gradient',
                ])
                ->default('forest-to-gray'),
            Wysiwyg::make()
            ->name('content')
            ->label('Content')
            ->note('Use toolbar to create h1')
            ->toolbarOptions([
                ['header' => [1,2, true]],
                'bold',
                'italic',
                'underline',
                'link',
                'clean'
            ])
            ->translatable()
            ->required(),
            CollapsibleContainer::make()
                ->label('Images')
                ->note('Upload images for desktop, tablet and mobile devices. If one missing, it will default to the next bigger size.')
                ->fields([
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
        return 'Hero Banner';
    }
}
