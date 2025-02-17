<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Radios;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Fourinone extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.fourinone');
    }

    public function getForm(): Form
    {
        return Form::make([
            Radios::make()
                ->name('color_scheme')
                ->inline()
                ->border()
                ->options(
                    Options::make([
                        Option::make('green', 'Green'),
                        Option::make('peach', 'Peach'),
                    ])
                )->default('green'),
            Wysiwyg::make()
                ->name('section_text')
                ->label('Secttion Title & Description')
                ->note('This will be displayed on the top left coroner of the section')
                ->required()
                ->translatable()
                ->toolbarOptions([
                    ['header' => [2, 3, false]],
                    'bold',
                    'italic',
                    'underline',
                    'link'
                ])->allowSource(true),
            Wysiwyg::make()
                ->name('left_text')
                ->label('Left Box Text')
                ->note('This will be displayed on the bottom left coroner box of the section')
                ->required()
                ->translatable()
                ->toolbarOptions([
                    'bold',
                    'italic',
                ])->allowSource(true),
            Wysiwyg::make()
                ->name('right_text')
                ->label('Right Box Text')
                ->note('This will be displayed on the bottom left coroner box of the section')
                ->required()
                ->translatable()
                ->toolbarOptions([
                    'bold',
                    'italic',
                ])->allowSource(true),
            Medias::make()
                ->name('col_image')
                ->label('Image')
                ->required()
                ->max(1)
        ]);
    }
}
