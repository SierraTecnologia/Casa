<?php

namespace Casa\Http\Controllers\Development;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Finder\Models\Digital\Code\Project;

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
        $service = new \Facilitador\Services\RepositoryService(new \Facilitador\Services\ModelService(Project::class));
        $registros = $service->getTableData();
        //     $teams = $this->repositoryService->paginated($request->user()->id);

        

        return view(
            'facilitador::repositories.index',
            compact('service', 'registros')
        );
        // $service = $this->service;

        // $fields = Field::all();

        // return view(
        //     'casa::finances.index',
        //     compact('service')
        // );
    }
}
