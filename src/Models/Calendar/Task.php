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

use Log;

class Task extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'time', // im segundos
        'money_code',
        'money_value',
        'description',
        'date_estimated',
        'done'
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
        ['name' => 'date_estimated', 'label' => 'Data Estimada', 'type' => 'date'],
        ['name' => 'done', 'label' => 'done', 'type' => 'text'],
    ];
    public $indexFields = [
        'name',
        'description',
        'date_estimated',
        'done',
    ];

    /**
     * Get the owning taskable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function taskable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
    
    /**
     * Eh um pra mts e nao mts pra mts
     *
     * @return void
     */
    // /**
    //  * Get all of the girls that are assigned this tag.
    //  */
    // public function girls()
    // {
    //     return $this->morphedByMany('Population\Models\Market\Actors\Girl', 'taskable');
    // }

    // /**
    //  * Get all of the users that are assigned this tag.
    //  */
    // public function users()
    // {
    //     return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'taskable');
    // }

}
