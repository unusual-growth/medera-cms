<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Featureheadlineswithsphericalimages extends TwillBlockComponent
{
    public function render(): View
    {
        define('PRESETS',[
            "peach" => [
                'text-bg-color' => 'peach_darken_1',
                'class' => 'peach_lighten_3',
            ],
            "forest" => [
                'text-bg-color' => 'forest_darken_1',
                'class' => 'forest_lighten_3',
            ],
            "cinereous" => [
                'text-bg-color' => 'cinereous_darken_1',
                'class' => 'cinereous_lighten_3',
            ],
            "aegean" => [
                'color' => 'aegean_darken_1',
                'class' => 'aegean_lighten_3',
            ],
        ]);
        return view('components.twill.blocks.featureheadlineswithsphericalimages');
    }

    public function getForm(): Form
    {
        return Form::make([
            Checkbox::make()
                ->name('has_section_content')
                ->label('Does this banner have section content?'),
            Wysiwyg::make()
                ->name('section_content')
                ->label('Section Content')
                ->toolbarOptions([
                    ['header' => [2, false]],
                    'bold',
                    'italic',
                    'underline',
                ])
                ->translatable()
                ->placeholder('Add your content here')->connectedTo('has_section_content', true),
            InlineRepeater::make()
                ->name('features')
                ->label('Feature Headlines with Spherical Images')
                ->max(4)
                ->fields([
                    Medias::make()
                        ->name('image')
                        ->label('Image')
                        ->note('image is rendered in spherical shape')
                        ->max(1),
                    Input::make()
                        ->name('title')
                        ->label('Title')
                        ->note('will be displayed in ellpiprical part')
                        ->translatable(),
                    Select::make()
                        ->name('color_preset')
                        ->label('Color Schema')
                        ->options(Options::make([
                            Option::make('peach', 'Peach'),
                            Option::make('forest', 'Forest'),
                            Option::make('cinereous', 'Cinereous'),
                            Option::make('aegean', 'Aegean'),
                        ]))->default('peach')
                ])
        ]);
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Feature Headlines with Spherical Images';
    }
    public static function getCrops(): array
    {
        return [
            "image" => [
                "default" => [
                    [
                        'name' => 'default',
                        'ratio' => 1,
                        'minValues' => [
                            'width' => 232,
                            'height' => 232
                        ]
                    ]
                ]
            ]
        ];
    }
}
