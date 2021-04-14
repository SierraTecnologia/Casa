<?php

namespace Casa\Http\Controllers\Social;

use Casa\Services\CasaService;
use Illuminate\Support\Facades\Schema;

use Fabrica\Models\Code\Field;
use Telefonica\Repositories\PersonRepository;

class PersonController extends Controller
{
    protected $service;

    public function __construct(CasaService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('casa::social.index')->with('service', $this->service);
    }

    public function persons(PersonRepository $personRepo)
    {
        // $orders = $personRepo->getByCustomer(auth()->id())->orderBy('created_at', 'DESC')->paginate(\Illuminate\Support\Facades\Config::get('siravel.pagination'));
        $persons = $personRepo->all(); //->paginate(\Illuminate\Support\Facades\Config::get('siravel.pagination'));

        return view('casa::social.persons')->with('persons', $persons);
    }

}
