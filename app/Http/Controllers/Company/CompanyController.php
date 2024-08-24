<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\QueryException;

class CompanyController extends Controller
{
    public function create(Request $request)
    {
        $resource = new Company();

        return Jetstream::inertia()->render($request, 'Test', $resource::GetFormParamaters($resource->getAttributes()));
    }

    public function store(CompanyRequest $request)
    {
        try {
            $resource = new Company();
            $resource->fill($request->validated());
            $resource->save();
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->route('companies.create')->with('message', $resource->name . ' successfully created!');
    }

    public function edit(Request $request, $id)
    {
        $resource = Company::findOrFail($id);
        return Jetstream::inertia()->render($request, 'Test', $resource::GetFormParamaters($resource->getAttributes()));
    }

    public function update(CompanyRequest $request, $id)
    {
        try {
            $resource = Company::findOrFail($id);
            $resource->fill($request->validated());
            $resource->save();
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->route('companies.edit', $resource->id)->with('message', $resource->name . ' successfully Updated!');
    }
}
