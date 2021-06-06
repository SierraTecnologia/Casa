<?php

namespace Casa\Models\Historic;

use Carbon\Carbon;
use Pedreiro\Models\Base;
use Muleta\Traits\Models\ComplexRelationamentTrait;

class Localization extends Base
{

    protected $table = 'history_localizations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timestamp',
        'latitude',
        'longitude',
        'accuracy',
        'altitude',
        'vertical_accuracy',
        'obs',
    ];
    // "activity" : [ {
    //   "timestampMs" : "1551036343674",
    //   "activity" : [ {
    //     "type" : "STILL",
    //     "confidence" : 100
    //   } ]

    protected $mappingProperties = array(
        'timestamp' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'latitude' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'longitude' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'accuracy' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'altitude' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'vertical_accuracy' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'timeline_id' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'obs' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
    );
    public $formFields = [
        ['name' => 'timestamp', 'label' => 'timestamp', 'type' => 'text'],
        [
            'name' => 'latitude',
            'label' => 'latitude',
            'type' => 'text'
        ],
        [
            'name' => 'longitude',
            'label' => 'longitude',
            'type' => 'text'
        ],
        [
            'name' => 'accuracy',
            'label' => 'accuracy',
            'type' => 'text'
        ],
        [
            'name' => 'altitude',
            'label' => 'altitude',
            'type' => 'text'
        ],
        [
            'name' => 'vertical_accuracy',
            'label' => 'vertical_accuracy',
            'type' => 'text'
        ],
        ['name' => 'timeline_id', 'label' => 'timeline_id', 'type' => 'text'],
        [
            'name' => 'obs',
            'label' => 'Observations',
            'type' => 'textarea'
        ],
    ];
    public $indexFields = [
        'timestamp',
        'latitude',
        'longitude',
        'accuracy',
        'altitude',
        'vertical_accuracy',
        'timeline_id',
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
     * 
     */
    public function timelineable()
    {
        return $this->belongTo(Timeline::class);
    }
    /**
     * Get all of the owning localizationable models.
     */
    public function localizationable()
    {
        return $this->morphTo();
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
                $timelineModel = new \Casa\Models\Historic\Timeline();
                $timelineModel->timestamp = $model->timestamp;
                $timelineModel->timelineable_id = $model->localizationable_id;
                $timelineModel->timelineable_type = $model->localizationable_type;
                $timelineModel->save();

                $model->timeline_id = $timelineModel->id;
            }
        );
    }
}
