<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\BranchRequest;
use App\Models\Company\Branch;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Exception;

class BranchController extends Controller
{
    public function create(Request $request)
    {
        $resource = new Branch();
        return Jetstream::inertia()->render($request, 'Test', $resource::GetFormParamaters($resource->getAttributes()));
    }

    public function store(BranchRequest $request)
    {
        try {
            $resource = new Branch();
            $resource->fill($request->validated());
            $resource->save();
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->route('branches.create')->with('message', $resource->name . ' successfully created!');
    }

    public function edit(Request $request, $id)
    {
        $resource = Branch::findOrFail($id);
        return Jetstream::inertia()->render($request, 'Test', $resource::GetFormParamaters($resource->getAttributes()));
    }

    public function update(BranchRequest $request, $id)
    {
        try {
            $resource = Branch::findOrFail($id);
            $resource->fill($request->validated());
            $resource->save();
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->route('branches.edit', $resource->id)->with('message', $resource->name . ' successfully Updated!');
    }
}
