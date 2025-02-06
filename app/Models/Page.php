<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Repositories\PageRepository;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;

class Page extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition, HasMetadata;
    public \Illuminate\Contracts\Foundation\Application|array|\Illuminate\Config\Repository|\Illuminate\Foundation\Application $metadataFallbacks = [];

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        'schema',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'schema',
    ];

    public $slugAttributes = [
        'title',
    ];
    public function __construct()
    {
        parent::__construct();
        $this->slugKey = 'page';
        $this->routeName = 'page';
    }
    public function resolveRouteBinding($slug, $field = null)
    {
        $page = app(PageRepository::class)->forSlug($slug);

        abort_if(! $page, 404);

        return $page;
    }

    // #region routekey
    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }
}
