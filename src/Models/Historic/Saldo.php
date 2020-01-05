<?php

namespace Casa\Models\Historic;

use Support\Models\Base;
use Informate\Traits\ComplexRelationamentTrait;

class Saldo extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'value',
        'date',
        'local_id',
    ];

    protected $mappingProperties = array(
        'description' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'value' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'date' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'local_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany('Population\Models\Identity\Actors\Person', 'saldoable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(config('sitec.core.models.user', \App\Models\User::class), 'saldoable');
    }
}
