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

namespace Casa\Models\Governanca;

use Muleta\Traits\Models\ComplexRelationamentTrait;
use Pedreiro\Models\Base;
use Finder\Actions\Action;
use Log;

class WikiCategory extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    protected $table = 'governanca_wiki_categories';

    public $incrementing = false;
    protected $casts = [
        'code' => 'string',
    ];
    protected $primaryKey = 'code';
    protected $keyType = 'string'; 



    protected $guarded = [];

    public $rules = [
        'code' => 'required',
    ];

    // protected $appends = [
    //     'translations',
    // ];

    protected $fillable = [
        'code',
        'name',
        'description',
        'published_at'
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
        ['name' => 'date_estimated', 'label' => 'Data Estimada', 'type' => 'date'],
    ];
    public $indexFields = [
        'name',
        'description',
        'published_at'
    ];

    protected $dates = [
        'published_at' => 'Y-m-d H:i'
    ];

    // public function history()
    // {
    //     return Archive::where('entity_type', get_class($this))->where('entity_id', $this->id)->get();
    // }
}
