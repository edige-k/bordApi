<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PartnerService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;
    public function __construct(PartnerService $service){
        $this->service = $service;
    }
}
