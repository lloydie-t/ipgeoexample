<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Route AJAX request to the provided controller and call the provided function passing the request parameters.
     *
     * @param Request $request
     * @param String $controller
     * @param String $function
     * @return mixed
     */
    public function index(Request $request, String $controller, String $function)
    {
        return app("App\Http\Controllers\AjaxControllers\\$controller")->$function($request);
    }
    
}