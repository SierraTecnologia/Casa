<?php

namespace Casa\Models\Identity\Digital;

use Casa\Models\Model;

class Email extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];

    protected $mappingProperties = array(
        /**
         * User Info
         */
        'email' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    
    /**
     * Get all of the slaves that are assigned this tag.
     */
    public function slaves()
    {
        return $this->morphedByMany('Casa\Models\Identity\Slave', 'skillable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'skillable');
    }
}
