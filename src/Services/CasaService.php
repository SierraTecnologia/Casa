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

        $this->person = \Population\Models\Identity\Actors\Person::first();
        // dd($this->person);
    }

    public function getModelServicesToArray()
    {
        
    }

    public function getProfile()
    {
        return $this->person;
    }

}
