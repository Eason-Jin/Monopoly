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

class Property extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'position',
        'cost',
        'rent0',
        'rent1',
        'rent2',
        'rent3',
        'rent4',
        'rentHotel',
        'mortgage',
        'costHouse',
        'costHotel',
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
