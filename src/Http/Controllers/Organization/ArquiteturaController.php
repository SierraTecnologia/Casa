<?php

namespace Casa\Http\Controllers\Organization;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Finder\Models\Digital\Code\Field;
use Finder\Models\Digital\Infra\Domain;
use Finder\Models\Digital\Infra\Container;


use Population\Models\Identity\Actors\Business;
use Population\Models\Identity\Actors\Person;


use Finder\Models\Digital\Code\Project;
use Finder\Models\Digital\Code\Wiki;
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
