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
    public function getHomepage()
    {
        if (filled($homepage = $this->theOnlyOne())) {
            return $homepage;
        }

        return $this->generate();
    }

    private function theOnlyOne()
    {
        return $this->model
            ->newQuery()
            ->withoutGlobalScope(MustBePublished::class)
            ->orderBy('id')
            ->take(1)
            ->get()
            ->first();
    }
    private function generate()
    {
        return app(HomepageRepository::class)->create([
            'title' => [
                config('translatable.locale') => config('app.name'),
            ],
            'published' => true,
        ]);
    }
}
