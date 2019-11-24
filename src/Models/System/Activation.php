<?php

namespace Casa\Models\System;

use Casa\Modela\Model;

class Activation extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}