<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\ControllerMiddlewareOptions;

abstract class Controller extends BaseController
{
    use AuthorizesRequests;
}
