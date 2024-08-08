<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Company\BranchResource;
use App\Models\Api\Company\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index (){
        $data = Branch::with('company')->get();
        return BranchResource::collection($data);
    }
    
}
