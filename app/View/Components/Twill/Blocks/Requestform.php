<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Requestform extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.requestform');
    }

    public function getForm(): Form
    {
        return Form::make([
            Checkbox::make()->name('has_title')->label('Does this form has a section title?')->default(true),
            Input::make()->name('title')->label( 'Section title')->connectedTo('has_title', true)->translatable(),
        ]);
    }
}
