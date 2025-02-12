<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;

class Videosection extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.videosection');
    }

    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()->name('title')
                ->translatable()
                ->toolbarOptions(toolbarOptions: [
                    ['header' => [1, 2, 3, false]],
                    'strong',
                    'italic',
                    'underline',
                    'link'
                ])->allowSource(true),
            Input::make()->name('video_url')->label('Youtube Video URL')->translatable()->required(),
        ]);
    }

    public static function getBlockTitle(?Block $block = null): string
    {
        return "Video Section";
    }
}
