<?php

/**
 * This file is part of Gitonomy.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Casa\Models\Calendar;

use Muleta\Traits\Models\ComplexRelationamentTrait;
use Pedreiro\Models\Base;
use Operador\Actions\Action;
use Log;

class Event extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    protected $table = 'events';

    protected $action = false;

    protected $target = false;

    protected $worker = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action_code',
        'target_id',
        'progress',
        'task',
        'stage'
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
    ];
    public $indexFields = [
        'name',
        'description',
    ];
    /**
     * @todo Peguei de outro projeto refatorar
     */

    // use Translatable, SoftDeletes, BusinessTrait;

    // public $table = 'events';

    // public $primaryKey = 'id';

    // protected $guarded = [];

    // public static $rules = [
    //     'title' => 'required',
    // ];

    // protected $appends = [
    //     'translations',
    // ];

    // protected $fillable = [
    //     'start_date',
    //     'end_date',
    //     'title',
    //     'details',
    //     'seo_description',
    //     'seo_keywords',
    //     'is_published',
    //     'template',
    //     'published_at',
    // ];

    // protected $dates = [
    //     'published_at' => 'Y-m-d H:i'
    // ];

    // public function __construct(array $attributes = [])
    // {
    //     $keys = array_keys(request()->except('_method', '_token'));
    //     $this->fillable(array_values(array_unique(array_merge($this->fillable, $keys))));
    //     parent::__construct($attributes);
    // }

    // public function getDetailsAttribute($value)
    // {
    //     return new Normalizer($value);
    // }

    // public function history()
    // {
    //     return Archive::where('entity_type', get_class($this))->where('entity_id', $this->id)->get();
    // }
}
