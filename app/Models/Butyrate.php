<?php

namespace App\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use App\Models\Behaviours\HasLocalizedRoute;
use A17\Twill\Models\Behaviors\HasTranslation;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use App\Models\Behaviours\HasTemplate;
use App\Repositories\ButyrateRepository;

class Butyrate extends Model
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasMetadata, HasLocalizedRoute, HasTemplate;
    public \Illuminate\Contracts\Foundation\Application|array|\Illuminate\Config\Repository|\Illuminate\Foundation\Application $metadataFallbacks = [];

    protected $fillable = [
        'published',
        'title',
        'description',
        'schema',
        'template',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'schema',
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


    public const DEFAULT_TEMPLATE = 'butyrateforhumans';
    //TODO: butyrateforhumans app-banner dan sonra tam bir vaka gelecek
    //TODO: allnaturalbutyrate 'app-iconlist', 'app-doublecolumncontent' arasina request form gelecek
    public const AVAILABLE_TEMPLATES = [
        [
            'value' => 'butyrateforhumans',
            'label' => 'Butyrate for Humans',
            'block_selection' => ['app-banner', 'app-accordionwithsingleimage', 'app-inlinebanner','app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-framesliderwithimage', 'app-iconlist', 'app-doublecolumnframedcontent', 'app-iconlist', 'app-doublecolumnframedcontent', 'app-iconlist', 'app-doublecolumncontent', 'app-inlinebanner','app-featuredblogs'],
        ],
        [
            'value' => 'drcaps',
            'label' => 'DRcaps',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-inlinebanner','app-columncardswithfullbackground', 'app-iconlist', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-featuredfaq'],
        ],
        [
            'value' => 'allnaturalbutyrate',
            'label' => 'All-Natural Butyrate',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-doublecolumnframedcontent', 'app-fullscreenbanner', 'app-doublecolumnframedcontent', 'app-doublecolumnframedcontent', 'app-sectioncontentwithsingleimage', 'app-framesliderwithimage', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-inlinebanner', 'app-doublecolumncontent'],
        ],
        [
            'value' => 'empty',
            'label' => 'Empty',
            'block_selection' => [],
        ],
    ];


    public function __construct()
    {
        parent::__construct();
        $this->slugKey = 'butyrate';
        $this->routeName = 'butyrate';
    }

    public function resolveRouteBinding($slug, $field = null)
    {
        $butyrate = app(ButyrateRepository::class)->forSlug($slug);

        abort_if(! $butyrate, 404);

        return $butyrate;
    }

    // #region routekey
    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }

    public static function getAvailableTemplates(): array
    {
        return static::AVAILABLE_TEMPLATES;
    }
}
