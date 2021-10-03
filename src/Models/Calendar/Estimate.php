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

class Estimate extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    protected $table = 'estimates';

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
     * Get the owning estimatable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function estimatable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
