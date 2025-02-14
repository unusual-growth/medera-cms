<?php

namespace App\Repositories\Behaviours;

use A17\Twill\Models\Contracts\TwillModelContract;

trait HandleTemplates
{
    public function afterSave(TwillModelContract $model, array $fields): void
    {
        parent::afterSave($model, $fields);
 
        if ($model->wasRecentlyCreated) {
            $model->prefillBlockSelection();
        }
    }
}