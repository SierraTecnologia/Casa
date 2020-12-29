<?php

namespace Casa\Models\Economic;

use Pedreiro\Models\Base;
use Muleta\Traits\Models\ComplexRelationamentTrait;

class Renda extends Base
{
    protected $fillable = [
        'target',
        'time', // im segundos
        'init', // date
        'end', // date
        'value',
        'obs', // im segundos
    ];

    protected $mappingProperties = array(
        'target' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'time' => [
            'type' => 'integer',
            "analyzer" => "standard",
        ],
        'init' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'value' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'obs' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    public $formFields = [
        [
            'name' => 'target',
            'label' => 'target',
            'type' => 'text'
        ],
        [
            'name' => 'description',
            'label' => 'description',
            'type' => 'text'
        ],
        [
            'name' => 'value',
            'label' => 'value',
            'type' => 'text'
        ],
        ['name' => 'init', 'label' => 'Inicio', 'type' => 'date'],
        ['name' => 'end', 'label' => 'End', 'type' => 'date'],
        // [
        //     'name' => 'status',
        //     'label' => 'Status',
        //     'type' => 'checkbox'
        // ],
        [
            'name' => 'obs',
            'label' => 'Observations',
            'type' => 'textarea'
        ],
        // ['name' => 'payment_type_id', 'label' => 'Payment Type', 'type' => 'select', 'relationship' => 'category'],
        // ['name' => 'tags', 'label' => 'Tags', 'type' => 'select_multiple', 'relationship' => 'tags'],
    ];

    public $indexFields = [
        'target',
        'description',
        'value',
        'init',
        'end',
        'obs',
    ];

    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'rendable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'rendable');
    }
}
