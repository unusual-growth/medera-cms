<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Models\Faq;
use Illuminate\Contracts\View\View;

class Featuredfaq extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.featuredfaq');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('heading')
                ->label('Heading')
                ->note('This will be displayed as a centered section heading (h2, primary)')
                ->translatable()
                ->required(),
            Input::make()
                ->name('link')
                ->label('Read More Link')
                ->note('All cards will link to this page')
                ->translatable()
                ->required(),
            Browser::make()
                ->modules([Faq::class])
                ->name('faqs')
                ->max(3)
        ]);
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Featured FAQ Cards';
    }

}
