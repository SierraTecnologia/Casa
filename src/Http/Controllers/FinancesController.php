<?php

namespace Casa\Http\Controllers;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Fabrica\Models\Code\Field;

class FinancesController extends Controller
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
            'casa::finances.index',
            compact('service')
        );
    }
}
