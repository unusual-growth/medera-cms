<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Doublecrossedcolumnswithcontent extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.doublecrossedcolumnswithcontent');
    }

    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()
            ->label('Text Left')
            ->name('text_left') 
            ->required()
            ->toolbarOptions([
                ['header' => [2,3,4, true]],
                'bold',
                'italic',
                'underline',
                'link',
                'clean'
            ])
            ->allowSource()
            ->translatable(),
            Wysiwyg::make()->name('text_right')
            ->label('Text Right')
            ->required()
            ->toolbarOptions([
                ['header' => [2,3,4, true]],
                'bold',
                'italic',
                'underline',
                'link',
                'clean'
            ])
            ->allowSource()
            ->translatable(),
        ]);
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Double Crossed Columns with Content";
    }
}
