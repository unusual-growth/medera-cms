<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Menulink extends Model implements Sortable
{
    use HasTranslation, HasPosition, HasNesting, HasRelated;

    public $translatedAttributes = [
        'title',
        'custom_url',
    ];
    protected $fillable = [
        'published',
        'title',
        'position',
        'location'
    ];

}
