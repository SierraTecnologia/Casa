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

namespace Casa\Models\Registers;

use Informate\Traits\ComplexRelationamentTrait;
use Support\Models\Base;
use Log;

class Spent extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    protected $table = 'spents';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'collaborator_id',
        'user_id',
        'initwork',
        'tempo_gasto'
    ];

}
