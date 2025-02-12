<?php

namespace App\View\Components\Twill\Blocks\Article;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\MultiSelect;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Image extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.article.image');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()->name('title'),
            Medias::make()
            ->name('image')
            ->label(label: twillTrans('Image'))
            ->max(1),
            Input::make()->name('width')->type('number'),
            Input::make()->name('height')->type('number'),
            MultiSelect::make()
            ->name('classes')
            ->label('Class Name')
            ->min(0)
            ->max(10)
            ->searchable()
            ->options(
                Options::make([
                    Option::make('lozad', 'lozad'),
                    Option::make('border-radius-oval', 'border-radius-oval'),
                ])
            ),
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
                ],
            ]
        ];
    }

    public static function getBlockIcon(): string
    {
        return 'image';
    }
    public static function getBlockGroup(): string
    {
        return 'library';
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Article Image (container)';
    }

}
