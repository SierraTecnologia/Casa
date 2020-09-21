<?php

namespace Casa\Models\Vendas;

use Pedreiro\Models\Base;

class Proposta extends Base
{

    protected $organizationPerspective = true;

    protected $table = 'propostas';       

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'parcelas',
        'money_id',
        'date',
        
    ];
}