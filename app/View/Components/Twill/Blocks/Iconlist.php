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

class Iconlist extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.iconlist');
    }

    public function getForm(): Form
    {
        return Form::make([
            Select::make()
            ->name(name: 'preset')
            ->options(
                Options::make([
                    Option::make('preset1', 'Heading peach'),
                    Option::make('preset2', 'Heading green '),
                    Option::make('preset3', label: 'Heading green - No text'),
                    Option::make('preset4', label: 'Heading green - With Border'),
                    Option::make('preset5', label: 'Heading green - With Border - Show Text on Hover'),

                ])
            )->label('Preset')
            ->required()
            ->default('preset1'),
            InlineRepeater::make()->name('icons') 
            ->fields([
    
                Medias::make()
                ->name('icon-list')
                ->label(label: twillTrans('Icon'))
                ->required()
                ->max(1),
                Input::make()
                    ->name(name: 'title')
                    ->required()
                    ->translatable(),
                Input::make()
                    ->name(name: 'text')
                    ->type(type: 'textarea')
                    ->required()
                    ->translatable(),
            ]) 
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'icon-list' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                        'minValues' => [
                            'width' => 51,
                            'height' => 59,
                        ],
                    ],
                ]
            ]
        ];
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Icon List";
    }

}
