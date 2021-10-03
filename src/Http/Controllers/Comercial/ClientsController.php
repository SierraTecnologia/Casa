<?php

namespace Casa\Http\Controllers\Comercial;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Fabrica\Models\Code\Project;

class ClientsController extends Controller
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
        $service = new \Support\Services\RepositoryService(new \Support\Services\ModelService(Project::class));
        $registros = $service->getTableData();
        //     $teams = $this->repositoryService->paginated($request->user()->id);

        

        return view(
            'support::components.repositories.index',
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
