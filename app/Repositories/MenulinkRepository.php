<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Menulink;

class MenulinkRepository extends ModuleRepository
{
    protected $relatedBrowsers = ['page'];

    use HandleTranslations, HandleNesting;

    public function __construct(Menulink $model)
    {
        $this->model = $model;
    }
}
