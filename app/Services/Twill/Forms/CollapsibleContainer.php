<?php

namespace App\Services\Twill\Forms;

use A17\Twill\Services\Forms\Contracts\CanHaveSubfields;
use A17\Twill\Services\Forms\Contracts\CanRenderForBlocks;
use A17\Twill\Services\Forms\Traits\HasSubFields;
use A17\Twill\Services\Forms\Traits\RenderForBlocks;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;

class CollapsibleContainer implements CanHaveSubfields, CanRenderForBlocks
{
    use RenderForBlocks;
    use HasSubFields;
    protected function __construct(
        public ?string $label = null,
        public ?string $note = null,
        protected ?array $connectedTo = null,
        public ?Collection $fields = null,

    ){}
    public static function make(): self
    {
        return new self();
    }
    public function fields(array $fields): static
    {
        $this->fields = collect($fields);
        return $this;
    }
    public function label(string $label): static
    {
        $this->label = $label;
        return $this;
    }
    public function note(string $note): static
    {
        $this->note = $note;
        return $this;
    }
    public function render(): View
    {
        // dd($this->forBlocks());
        // dd($this->fields);
        if ($this->forBlocks()) {
            $this->fields?->each(fn(CanRenderForBlocks $field) => $field->renderForBlocks());
        }

        $component = ViewFacade::make('partials.form.utils._collapsible-container', [
            'label' => $this->label,
            'note' => $this->note,
            'fields' => $this->fields,
        ]);

        if ($this->connectedTo) {
            return view('twill::partials.form.utils._connected_fields', [
                ...$this->connectedTo,
                'renderForBlocks' => $this->forBlocks(),
                'slot' => $component->render(),
            ]);
        }
        return $component;
    }
    public function connectedTo(string $fieldName, mixed $fieldValues, array $options = [])
    {
        $this->connectedTo = [
            'fieldName' => $fieldName,
            'fieldValues' => $fieldValues,
            ...$options,
        ];

        return $this;
    }
    public function registerDynamicRepeaters(): void
    {
        $this->registerDynamicRepeatersFor($this->fields);
    }
}
