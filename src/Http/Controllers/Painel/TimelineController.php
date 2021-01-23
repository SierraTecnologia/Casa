<?php

namespace Casa\Http\Controllers\Painel;

use Casa\Models\Historic\Timeline;
use Illuminate\Support\Facades\Schema;
use Pedreiro\CrudController;
use Exception;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    use CrudController;


    public function __construct(Timeline $model)
    {
        $this->model = $model;
        parent::__construct();
    }


    public function render(Request $request)
    {


        $registros = Timeline::orderBy('timestamp', 'DESC')->get();
        $service = null;
    //     // $service = $this->service;

    //     $service = new \Support\Services\RepositoryService(new \Support\Services\ModelService(Timeline::class));
    //     $registros = $service->getTableData();
    //     //     $teams = $this->repositoryService->paginated($request->user()->id);

        

        return view(
            'casa::components.timeline.index',
            compact('service', 'registros')
        );
    }
}
