<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Repositories\BlogCategoryRepository;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;

class BlogCategory extends Model implements Sortable
{
    use HasTranslation, HasSlug, HasRevisions, HasPosition, HasNesting, HasRelated, HasMetadata, HasMedias;
    public \Illuminate\Contracts\Foundation\Application|array|\Illuminate\Config\Repository|\Illuminate\Foundation\Application $metadataFallbacks = []; 

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];

    public $translatedAttributes = [
        'title',
        'description',
    ];

    public $slugAttributes = [
        'title',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    public function resolveRouteBinding($slug, $field = null)
    {
        $blogCategory = app(BlogCategoryRepository::class)->forSlug($slug);

        abort_if(! $blogCategory, 404);

        return $blogCategory;
    }
 
    // #region routekey
    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }

    public function categories()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }


}
