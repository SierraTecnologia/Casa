<?php

namespace Casa\Models\Entytys\Digital\Code;

use Casa\Models\Model;

class Language extends Model
{
    protected $organizationPerspective = false;

    protected $table = 'code_languages';      

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'code_language_id',
        'status',
    ];
}