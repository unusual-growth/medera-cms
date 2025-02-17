<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Services\Listings\Filters\FreeTextSearch;
use App\Models\HowWeWork;
use App\Repositories\Behaviours\HandleTemplates;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;
use Illuminate\Support\Collection;

class HowWeWorkRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions, HandleMetadata, HandleTemplates;

    public function __construct(HowWeWork $model)
    {
        $this->model = $model;
    }
    public function cmsSearch(string $search, array $fields = [], callable $query = null): Collection
    {
        $searchFilter = new FreeTextSearch();
        $searchFilter = $searchFilter->searchFor($search);
        $searchFilter->searchColumns($fields);
        $searchFilter->searchQuery($query);

        $builder = $this->model->latest();

        $searchFilter->applyFilter($builder);

        return $builder->get();
    }
}
