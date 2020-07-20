<?php
/**
 * Serviço referente a linha no banco de dados
 */

namespace Casa\Services;

/**
 * 
 */
class CasaService
{

    protected $config;

    protected $person = false;

    public function __construct($config = false)
    {
        if (!$this->config = $config) {
            $this->config = \Illuminate\Support\Facades\Config::get('sitec.sitec.models');
        }

        // $this->person = \Telefonica\Models\Actors\Person::first();
        $this->person = \Telefonica\Models\Actors\Person::find('ricardo.sierra');
        // dd($this->person->gastos());
    }

    public function getModelServicesToArray()
    {
        
    }

    public function getProfile()
    {
        return $this->person;
    }

}
