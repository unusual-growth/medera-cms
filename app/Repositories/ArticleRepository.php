<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;
use Illuminate\Support\Collection;
use A17\Twill\Services\Listings\Filters\FreeTextSearch;

class ArticleRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions, HandleMetadata;


    protected $relatedBrowsers = ['related'];

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function published(): Builder
    {
        // dd(now());
        return Article::query()
            ->whereHas('translations', function ($query) {
                $query->where('active', true)
                    ->where('locale', app()->getLocale());
            })
            ->where('publish_start_date', '<=', now());
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
