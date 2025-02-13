<?php

namespace App\Repositories;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\BlogCategory;

class BlogCategoryRepository extends ModuleRepository
{
    use HandleTranslations, HandleSlugs, HandleRevisions, HandleNesting, HandleMetadata;

    protected $relatedBrowsers = ['categories'];

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    public function afterSave(TwillModelContract $model, array $fields): void
    {
        $this->updateBrowser($model, $fields, 'categories');
        parent::afterSave($model, $fields);
    }

    public function getFormFields(TwillModelContract $object): array
    {
        $fields = parent::getFormFields($object);
        $fields['browsers']['categories']  = $this->getFormFieldsForRelatedBrowser($object, 'categories');
        return $fields;
       
    }
}
