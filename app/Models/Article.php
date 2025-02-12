<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasSlug;
use App\Repositories\ArticleRepository;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Article extends Model implements LocalizedUrlRoutable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition, HasFactory, HasRelated, HasMetadata;
    public \Illuminate\Contracts\Foundation\Application|array|\Illuminate\Config\Repository|\Illuminate\Foundation\Application $metadataFallbacks = [];           

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        'publish_start_date',
        'publish_end_date',
    ];

    public $casts = [
        'publish_start_date' => 'datetime',
        'publish_end_date' => 'datetime'
    ];
    
    public $translatedAttributes = [
        'title',
        'description',
    ];
    
    public $slugAttributes = [
        'title',
    ];
    
    public $mediasParams = [
        'library-image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 2880 / 800,
                ],
            ],
            'thumbnail' => [
                [
                    'name' => 'default',
                    'ratio' => 730 / 440,
                ],
            ]
        ],
    ];

    public function resolveRouteBinding($slug, $field = null)
    {
        $article = app(ArticleRepository::class)->forSlug($slug);

        abort_if(! $article, 404);

        return $article;
    }
 
    // #region routekey
    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }

}