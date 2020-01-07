<?php

namespace Casa\Http\Controllers;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

class FinancesController extends Controller
{
    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        return view('casa::finances.index');
    }
}
