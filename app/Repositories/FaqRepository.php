<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Faq;

class FaqRepository extends ModuleRepository
{
    use HandleTranslations, HandleRevisions;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }
}
