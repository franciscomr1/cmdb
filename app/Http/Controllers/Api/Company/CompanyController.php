<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Company\CompanyResource;
use App\Models\Api\Company\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index (){
        $data = Company::get();
        return CompanyResource::collection($data);
    }
}
