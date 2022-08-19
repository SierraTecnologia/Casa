<?php

namespace Casa\Http\Controllers;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Finder\Models\Code\Field;

class FinancesController extends Controller
{
    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index(Request $request)
    {
        $service = $this->service;

        return view(
            'casa::finances.index',
            compact('service')
        );
    }
}
