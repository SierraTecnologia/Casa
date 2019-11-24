<?php

namespace Casa\Models\Entytys\Digital\Code;

use Casa\Models\Model;

class Issue extends Model
{

    protected $organizationPerspective = true;

    protected $table = 'code_issues';

    protected $action = false;

    protected $target = false;

    protected $worker = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key_name',
        'slug',
        'url',
    ];


    public function project()
    {
        return $this->belongsTo('Casa\Models\Entytys\Digital\Code\Project', 'code_project_id', 'id');
    }

    
}