<?php

namespace Casa\Http\Controllers\Comercial;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Fabrica\Models\Code\Project;
use Facilitador\Facades\Facilitador;
use Exception;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index(Request $request)
    {
        $service = new \Support\Services\RepositoryService(new \Support\Services\ModelService(Project::class));
        
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $service->getSlug();

        // GET THE DataType based on the slug
        if (!is_object($dataType = Facilitador::model('DataType')->where('slug', '=', $slug)->first())) {
            throw new Exception;
        }

        // // Check permission
        // $this->authorize('browse', app($dataType->model_name));

        return $service->repositoryIndex($dataType, $request);
    }
}
