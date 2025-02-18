<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Models\Block;
use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Featuredescriptionwithimage extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.featuredescriptionwithimage');
    }

    public function getForm(): Form
    {
        return Form::make([
            InlineRepeater::make()
                ->name('features_1')
                ->label('Features')
                ->selectTriggerText('Add Content')
                ->fields([
                    Input::make()->name("title")->label('Title')->translatable(),
                    Input::make()->name("description")->label('Description')->type('textarea')->translatable(),
                    Medias::make()->name("image")->label('Image')->max(1)->translatable(),
                ])
        ]);
    }
    public static function getCrops(): array {
        return [
            "image" => [
                'default' => [
                    ['name' => 'default', 'ratio' => 282 / 172],
                ],
            ],
        ];
    }
    public static function getBlockTitle(?Block $block = null): string
    {
        return 'Feature Description with Image';
    }
}
