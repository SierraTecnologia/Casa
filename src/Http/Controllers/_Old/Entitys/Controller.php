<?php

namespace Casa\Http\Controllers\Admin;

use Response;
use Casa\Http\Controllers\Controller as BaseController;
use Log;

class Controller extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
