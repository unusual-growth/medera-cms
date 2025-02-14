<?php

namespace App\Models\Behaviours;

use A17\Twill\Repositories\BlockRepository;

trait HasTemplate
{
    abstract public static function getAvailableTemplates(): array;

    public function getTemplateLabelAttribute()
    {
        $template = collect(static::getAvailableTemplates())->firstWhere('value', $this->template);

        return $template['label'] ?? '';
    }

    public function getTemplateBlockSelectionAttribute()
    {
        $template = collect(static::getAvailableTemplates())->firstWhere('value', $this->template);
 
        return $template['block_selection'] ?? [];
    }

    public static function getTemplateOptions()
    {
        return collect(static::getAvailableTemplates())
            ->pluck('label', 'value')
            ->toArray();
    }

    public function prefillBlockSelection()
    {
        $i = 1;
 
        foreach ($this->template_block_selection as $blockType) {
            app(BlockRepository::class)->create([
                'blockable_id' => $this->id,
                'blockable_type' => static::class,
                'position' => $i++,
                'content' => '{}',
                'type' => $blockType,
            ]);
        }
    }
} 