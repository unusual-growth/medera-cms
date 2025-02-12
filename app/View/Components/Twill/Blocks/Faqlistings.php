<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use App\Models\Faq;
use Illuminate\Contracts\View\View;

class Faqlistings extends TwillBlockComponent
{
    public function render(): View
    {
        $share = [];
        if ($this->block->input('show_all_faqs')) {
            $share["faqs"] = Faq::published()->orderBy('position', 'asc')->get();
        } else {
            $share["faqs"] = $this->block->getRelated('faqs');
        }
        return view('components.twill.blocks.faqlistings', $share);
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()
            ->name('heading')
            ->label('Heading')
            ->translatable()
            ->required(),
        Input::make()
            ->name('text')
            ->label('Text')
            ->type('textarea')
            ->translatable()
            ->required(),
        Checkbox::make()
            ->name('show_all_faqs')->label('Show all FAQs')->default(true),
        Browser::make()
            ->modules([Faq::class])
            ->name('faqs')
            ->max(100)
            ->connectedTo('show_all_faqs', false)
        ]);
    }
}
