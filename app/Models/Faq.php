<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Faq extends Model implements Sortable
{
    use HasTranslation, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'answer',
        'position',
    ];

    public $translatedAttributes = [
        'title',
        'answer',
    ];

}
