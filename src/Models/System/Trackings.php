<?php

namespace Casa\Models\System;

use Informate\Traits\ArchiveTrait;

use Informate\Traits\BusinessTrait;

class Trackings extends ArchiveTrait
{
    use BusinessTrait;
    
    public $table = 'trackings';

    public $primaryKey = 'id';

    public $fillable = [
        'token',
        'data',
    ];

    public static $rules = [];
}
