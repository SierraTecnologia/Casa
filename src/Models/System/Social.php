<?php
namespace Casa\Models\System;

use Casa\Models\Model;

class Social extends Model {

    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}