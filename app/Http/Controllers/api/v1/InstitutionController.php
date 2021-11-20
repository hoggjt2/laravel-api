<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstitutionResource;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Models\Institution;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * response_message() can be found in Controller.php
 */

class InstitutionController extends Controller
{
    public function index()
    {
        ray()->queries(); // Debugging purposes

        $query = QueryBuilder::for(Institution::class)
                    ->allowedFilters(['name', 'region', 'country'])
                    ->allowedSorts(['name', 'region', 'country']);

        if ($query->count() > 0) {
            return InstitutionResource::collection(
                $query->paginate(25)
            );
        } else {
            return $this->response_message('Institutions not found', 404);
        }
    }

    public function store(StoreInstitutionRequest $request)
    {
        Institution::create($request->validated());
        return $this->response_message('Institution created', 201);
    }

    public function show($id)
    {
        if (Institution::where('id', $id)->exists()) {
            $institution = new InstitutionResource(Institution::find($id));
            return response($institution, 202);
        } else {
            return $this->response_message('Institution not found', 404);
        }
    }

    public function update(UpdateInstitutionRequest $request, $id)
    {
        if (Institution::where('id', $id)->exists()) {
            $institution = Institution::find($id);
            $institution->update($request->all());
            return $this->response_message('Institution updated', 200);
        } else {
            return $this->response_message('Institution not found', 404);
        }
    }

    public function destroy($id)
    {
        if (Institution::where('id', $id)->exists()) {
            Institution::destroy($id);
            return $this->response_message('Institution deleted', 202);
        } else {
            return $this->response_message('Institution not found', 404);
        }
    }
}