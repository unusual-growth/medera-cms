<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Columns;
use A17\Twill\Services\Forms\Fields\Repeater;
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

class Framesliderwithimage extends TwillBlockComponent
{
    public static function getCrops(): array
    {
        return [
            'image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
        ];
    }

    public function render(): View
    {
        return view('components.twill.blocks.framesliderwithimage');
    }

    public function getForm(): Form
    {
        return Form::make([
            Select::make()
                ->options(
                    Options::make([
                        Option::make('preset-1', 'Black Header(24px) and Paragraph(18px)'),
                        Option::make('preset-2', 'Peach Header(24px) and Black Paragraph(18px)'),
                        Option::make('preset-3', 'Peach Header(36px) and Paragraph(18px)'),
                    ])
                )
                ->default('preset-1')
                ->name('preset')
                ->label('Preset')
                ->note('Choose a preset for the text color')
                ->required(),
            Repeater::make()
                ->name('slides')
                ->type('image-wysiwyg')

        ]);
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Frameslider with image';
    }
}
