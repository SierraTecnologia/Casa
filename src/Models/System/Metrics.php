<?php

namespace Casa\Models\System;

use Informate\Traits\ArchiveTrait;

class Metrics extends ArchiveTrait
{
    public $table = 'metrics';

    public $primaryKey = 'id';

    public $fillable = [
        'token',
        'data',
    ];

    public static $rules = [];
}
