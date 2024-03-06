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

class Special extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'position',
        'cost',
        'own1',
        'own2',
        'own3',
        'own4',
        'mortgage',
    ];
    
    public $translatedAttributes = [
        'title',
        'active',
    ];
    
    public $slugAttributes = [
        'title',
    ];
    
    public $mediasParams = [
        'cover' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
        ],

        'picture' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
        ],

        'icon' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
        ],
    ];
    
}
