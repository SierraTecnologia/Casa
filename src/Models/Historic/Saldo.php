<?php

namespace Casa\Models\Historic;

use Pedreiro\Models\Base;
use Muleta\Traits\Models\ComplexRelationamentTrait;

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
        'obs',
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
    public $formFields = [
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
        [
            'name' => 'value',
            'label' => 'value',
            'type' => 'text'
        ],
        ['name' => 'date', 'label' => 'Data', 'type' => 'date'],
        ['name' => 'local_id', 'label' => 'local_id', 'type' => 'text'],
        [
            'name' => 'obs',
            'label' => 'Observations',
            'type' => 'textarea'
        ],
    ];
    public $indexFields = [
        'description',
        'value',
        'date',
        'local_id',
        'obs',
    ];

    
    /**
     * Get all of the slaves that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function persons(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'saldoable');
    }

    /**
     * Get all of the users that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'saldoable');
    }
}
