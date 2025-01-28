<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Homepage;

class HomepageRepository extends ModuleRepository
{
    use HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions;

    public function __construct(Homepage $model)
    {
        $this->model = $model;
    }
}
