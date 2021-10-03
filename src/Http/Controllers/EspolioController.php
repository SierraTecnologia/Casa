<?php

namespace Casa\Http\Controllers;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

class EspolioController extends Controller
{
    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $service = $this->service;

        return view(
            'casa::espolio.index',
            compact('service')
        );
    }
}
