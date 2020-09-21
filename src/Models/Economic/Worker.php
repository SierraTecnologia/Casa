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

    /**
     * Get all of the owning workerable models.
     */
    public function workerable()
    {
        return $this->morphTo();
    }
}
