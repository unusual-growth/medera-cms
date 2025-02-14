<?php

namespace App\Models;

use A17\Twill\Models\Model;
use App\Repositories\WhoweareRepository;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use App\Models\Behaviours\HasLocalizedRoute;
use A17\Twill\Models\Behaviors\HasTranslation;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use App\Models\Behaviours\HasTemplate;

class Whoweare extends Model
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


    public const DEFAULT_TEMPLATE = 'aboutus';
  
    public const AVAILABLE_TEMPLATES = [
        [
            'value' => 'aboutus',
            'label' => 'About Us',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-doublecrossedcolumnswithcontent','app-doublecolumncontent', 'app-doublecolumnframedcontent', 'app-featureheadlineswithsphericalimages', 'app-doublecolumncontent', 'app-iconlist', 'app-inlinebanner', 'app-doublecolumncontent', 'app-inlinebanner'],
        ],
        [
            'value' => 'sustainability',
            'label' => 'Sustainability',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-doublecolumncontent','app-doublecolumnframedcontent', 'app-doublecolumncontent', 'app-iconlist'],
        ],
       /*  [
            'value' => 'certificates',
            'label' => 'Certificates',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-doublecolumnframedcontent', 'app-fullscreenbanner', 'app-doublecolumnframedcontent', 'app-doublecolumnframedcontent', 'app-sectioncontentwithsingleimage', 'app-framesliderwithimage', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-inlinebanner', 'app-doublecolumncontent'],
        ], */

        [
            'value' => 'empty',
            'label' => 'Empty',
            'block_selection' => [],
        ],
    ];


    public function __construct()
    {
        parent::__construct();
        $this->slugKey = 'whoweare';
        $this->routeName = 'whoweare';
    }

    public function resolveRouteBinding($slug, $field = null)
    {
        $whoweare = app(WhoweareRepository::class)->forSlug($slug);

        abort_if(! $whoweare, 404);

        return $whoweare;
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
