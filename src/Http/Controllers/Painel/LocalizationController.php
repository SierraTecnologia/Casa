<?php

namespace Casa\Http\Controllers\Painel;

use Casa\Models\Historic\Localization;
use Illuminate\Support\Facades\Schema;
use Pedreiro\CrudController;
use Exception;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    use CrudController;

    public function __construct(Localization $model)
    {
        $this->model = $model;

        // Configure Controller
        $this->withPagination = 15;

        // Call Parent
        parent::__construct();
    }


    // public function index(Request $request)
    // {
    //     // $service = $this->service;

    //     $service = new \Support\Services\RepositoryService(new \Support\Services\ModelService(Localization::class));
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
