<?php

namespace App\View\Components\Twill\Blocks\Article;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Content extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.article.content');
    }

    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()->name('text')
            ->allowSource(true)->translatable()
        ]);
    }
    public static function getBlockGroup(): string
    {
        return 'library';
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Article Content (container)';
    }
}
