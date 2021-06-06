<?php

namespace Casa\Http\Controllers\RiCa;

use Casa\Models\Calendar\AcaoHumana;
use Illuminate\Support\Facades\Schema;
use Pedreiro\CrudController;

class AcaoHumanaController extends Controller
{
    use CrudController;


    public function __construct(AcaoHumana $model)
    {
        $this->model = $model;
        parent::__construct();
    }


    // public function index(Request $request)
    // {
    //     // $service = $this->service;

    //     $service = new \Support\Services\RepositoryService(new \Support\Services\ModelService(AcaoHumana::class));
    //     $registros = $service->getTableData();
    //     //     $teams = $this->repositoryService->paginated($request->user()->id);

        

    //     return view(
    //         'support::components.repositories.index',
    //         compact('service', 'registros')
    //     );

    //     // return view(
    //     //     'casa::finances.index',
    //     //     compact('service')
    //     // );
    // }
}
