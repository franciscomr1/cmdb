<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\EmployeeRequest;
use App\Http\Resources\Api\Company\EmployeeCollection;
use App\Http\Resources\Api\Company\EmployeeResource;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Api\Company\Employee;

class EmployeeController extends Controller
{
    public function index (){
        $data = Employee::with('branch', 'position')->get();
        return EmployeeResource::collection($data);
    }
}
