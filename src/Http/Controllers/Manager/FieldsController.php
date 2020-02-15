<?php

namespace Casa\Http\Controllers\Manager;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Finder\Models\Digital\Code\Field;

class FieldsController extends Controller
{
    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        // $service = $this->service;

        $service = new \Facilitador\Services\RepositoryService(new \Facilitador\Services\ModelService(Field::class));
        $registros = $service->getTableData();
        //     $teams = $this->repositoryService->paginated($request->user()->id);

        

        return view(
            'facilitador::repositories.index',
            compact('service', 'registros')
        );

        // return view(
        //     'casa::finances.index',
        //     compact('service')
        // );
    }
}
