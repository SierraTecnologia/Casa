<?php

namespace Casa\Models\Economic;

use Support\Models\Base;
use Informate\Traits\ComplexRelationamentTrait;

class Gasto extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'obs',
        'value',
        'payment_type_id',
        'date',
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
    );
    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany('Population\Models\Identity\Actors\Person', 'gastoable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(config('sitec.core.models.user', \App\Models\User::class), 'gastoable');
    }
}
