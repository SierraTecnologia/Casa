<?php

namespace Casa\Models\Historic;

use Carbon\Carbon;
use Pedreiro\Models\Base;
use Muleta\Traits\Models\ComplexRelationamentTrait;

class Timeline extends Base
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'year',
        // 'month',
        // 'day',
        'timestamp',
        'obs',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'timestamp' => 'datetime',
    ];

    protected $mappingProperties = array(
        // 'year' => [
        //     'type' => 'string',
        //     "analyzer" => "standard",
        // ],
        // 'month' => [
        //     'type' => 'string',
        //     "analyzer" => "standard",
        // ],
        // 'day' => [
        //     'type' => 'string',
        //     "analyzer" => "standard",
        // ],
        'timestamp' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'obs' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    public $formFields = [
        // ['name' => 'year', 'label' => 'year', 'type' => 'text'],
        // [
        //     'name' => 'month',
        //     'label' => 'month',
        //     'type' => 'text'
        // ],
        // [
        //     'name' => 'day',
        //     'label' => 'day',
        //     'type' => 'text'
        // ],
        [
            'name' => 'timestamp',
            'label' => 'timestamp',
            'type' => 'text'
        ],
        // ['name' => 'date', 'label' => 'Data', 'type' => 'date'],
        // ['name' => 'local_id', 'label' => 'local_id', 'type' => 'text'],
        [
            'name' => 'obs',
            'label' => 'Observations',
            'type' => 'textarea'
        ],
    ];
    public $indexFields = [
        // 'year',
        // 'month',
        // 'day',
        'timestamp',
        'obs',
    ];

    
    // /**
    //  * Get all of the slaves that are assigned this tag.
    //  */
    // public function persons()
    // {
    //     return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Telefonica\Models\Actors\Person::class), 'saldoable');
    // }

    // /**
    //  * Get all of the users that are assigned this tag.
    //  */
    // public function users()
    // {
    //     return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'saldoable');
    // }

    
    /**
     * Local aonde está a mensagem
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function timelineable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
    
    /**
     * Get all of the post's localizations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function localizations(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Localization::class, 'localizationable');
    }

    

    /**
     * Register events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {

            }
        );
    }
}
