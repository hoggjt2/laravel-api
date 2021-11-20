<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * response_message() can be found in Controller.php
 */

class DepartmentController extends Controller
{
    public function index()
    {
        // ray()->queries(); // Debugging purposes

        $query = QueryBuilder::for(Department::class)
                    ->allowedFilters(['name'])
                    ->allowedSorts(['name']);

        if ($query->count() > 0) {
            return DepartmentResource::collection(
                $query->paginate(25)
            );
        } else {
            return $this->response_message('Departments not found', 404);
        }
    }

    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());
        return $this->response_message('Department created', 201);
    }

    public function show($id)
    {
        if (Department::where('id', $id)->exists()) {
            $department = new DepartmentResource(Department::find($id));
            return response($department, 202);
        } else {
            return $this->response_message('Department not found', 404);
        }
    }

    public function update(UpdateDepartmentRequest $request, $id)
    {
        if (Department::where('id', $id)->exists()) {
            $department = Department::find($id);
            $department->update($request->validated());
            return $this->response_message('Department updated', 200);
        } else {
            return $this->response_message('Department not found', 404);
        }
    }

    public function destroy($id)
    {
        if (Department::where('id', $id)->exists()) {
            Department::destroy($id);
            return $this->response_message('Department deleted', 202);
        } else {
            return $this->response_message('Department not found', 404);
        }
    }
}
