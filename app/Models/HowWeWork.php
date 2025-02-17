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
use App\Models\Behaviours\HasLocalizedRoute;
use App\Models\Behaviours\HasTemplate;
use App\Repositories\HowWeWorkRepository;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;

class HowWeWork extends Model
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
        'schema',
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
    public const DEFAULT_TEMPLATE = 'empty';
    //TODO: butyrateforhumans app-banner dan sonra tam bir vaka gelecek
    //TODO: allnaturalbutyrate 'app-iconlist', 'app-doublecolumncontent' arasina request form gelecek
    public const AVAILABLE_TEMPLATES = [
        [
            'value' => 'empty',
            'label' => 'Empty',
            'block_selection' => [],
        ],
        [
            'value' => 'packaging',
            'label' => 'Packaging',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-iconlist', 'app-doublecolumncontent', 'app-inlinebanner', 'app-iconlist', 'app-doublecolumnframedcontent', 'app-inlinebanner', 'app-featuredescriptionwithimage', 'app-doublecolumncontent', 'app-inlinebanner', 'app-inlinebanner', 'app-doublecolumncontent', 'app-inlinebanner', 'app-iconlist', 'app-doublecolumncontent', 'app-inlinenanner', 'app-featuredescriptionwithimage', 'app-doublecolumncontent', 'app-doublecrossedcolumnswithcontent'],
        ],
        [
            'value' => 'shipping',
            'label' => 'Shipping',
            'block_selection' => ['app-banner', 'app-doublecolumncontent', 'app-doublecolumncontent', 'app-doublecolumncontent', 'app-doublecrossedcolumnswithcontent', 'app-doublecolumncontent',  'app-doublecrossedcolumnswithcontent', 'app-iconlist',  'app-doublecolumncontent',  'app-doublecolumncontent', 'app-inlinebanner'],

        ]
    ];

    public function __construct()
    {
        parent::__construct();
        $this->slugKey = 'how-we-work';
        $this->routeName = 'how-we-work';
    }
    public function resolveRouteBinding($slug, $field = null)
    {
        $butyrate = app(HowWeWorkRepository::class)->forSlug($slug);

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
