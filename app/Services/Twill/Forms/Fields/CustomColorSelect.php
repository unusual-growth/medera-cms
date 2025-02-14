<?php

namespace App\Services\Twill\Forms\Fields;


use A17\Twill\Services\Forms\Fields\Traits\IsTranslatable;
use A17\Twill\Services\Forms\Fields\BaseFormField;
class CustomColorSelect extends BaseFormField
{
    use IsTranslatable;
    protected ?array $colors = null;

    public static function make(): static
    {
        return new self(
            component: \App\View\Twill\Components\Fields\CustomColorSelect::class,
            mandatoryProperties: ['label','colors']
        );
    }

    public function colors(array $colors): static
    {
        $this->colors = $colors;

        return $this;
    }
}
