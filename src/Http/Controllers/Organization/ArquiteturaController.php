<?php

namespace Casa\Http\Controllers\Organization;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Fabrica\Models\Code\Field;
use Fabrica\Models\Infra\Domain;
use Fabrica\Models\Infra\Container;


use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Person;


use Fabrica\Models\Code\Project;
use Fabrica\Models\Code\Wiki;
use Population\Models\Features\Qa\Analyser;


use Population\Models\Identity\Digital\Account;
use Population\Models\Components\Integrations\Token;



use Informate\Models\Entytys\Fisicos\Weapon;

class ArquiteturaController extends Controller
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

        //Domain
        

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
