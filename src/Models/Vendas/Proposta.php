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
        'name',
        'value',
        'parcelas',
        'money_id',
        'date',
        
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'name', 'type' => 'textarea'],
        [
            'name' => 'value',
            'label' => 'value',
            'type' => 'text'
        ],
        ['name' => 'parcelas', 'label' => 'parcelas', 'type' => 'text'],
        ['name' => 'date', 'label' => 'Data', 'type' => 'date'],
        ['name' => 'money_id', 'label' => 'money_id', 'type' => 'text'],
        // [
        //     'name' => 'obs',
        //     'label' => 'Observations',
        //     'type' => 'textarea'
        // ],
    ];
    public $indexFields = [
        'name',
        'value',
        'parcelas',
        'date',
        'money_id',
        'obs',
    ];
}