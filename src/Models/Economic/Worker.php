<?php

namespace Casa\Models\Economic;

use Pedreiro\Models\Base;

class Worker extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'time', // im segundos
        'init', // date
        'obs', // im segundos
    ];

    protected $mappingProperties = array(
        'content' => [
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
        'obs' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    public $formFields = [
        [
            'name' => 'text',
            'label' => 'text',
            'type' => 'text'
        ],
        ['name' => 'init', 'label' => 'Inicio', 'type' => 'date'],
        ['name' => 'time', 'label' => 'Tempo', 'type' => 'text'],
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
        'text',
        'init',
        'time',
        'obs',
    ];


    /**
     * Get all of the owning workerable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function workerable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
