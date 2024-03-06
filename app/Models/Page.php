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

class Page extends Model implements Sortable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];
    
    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];
    
    public $slugAttributes = [
        'title',
    ];
    
    public $mediasParams = [
        'background' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
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
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
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
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],

        'cover' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],

        'parking_icon' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],

        'jail_icon' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],

        'in_jail_icon' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],

        'go_icon' => [
            'free' => [
                [
                    'name' => 'free',
                    'ratio' => null,
                ],
            ],
            'square' => [
                [
                    'name' => 'square',
                    'ratio' => 1,
                ],
            ],
        ],
    ];
}
