<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * response_message() can be found in Controller.php
 */

class StudentController extends Controller
{
    public function index()
    {
        // ray()->queries(); // Debugging purposes

        $query = QueryBuilder::for(Student::class)
                    ->allowedFilters(['first_name', 'last_name'])
                    ->allowedSorts(['first_name', 'last_name']);

        if ($query->count() > 0) {
            return StudentResource::collection(
                $query->paginate(25)
            );
        } else {
            return $this->response_message('Students not found', 404);
        }
    }

    public function store(StoreStudentRequest $request)
    {
        //Student::create($request->validated());
        Student::create($request);
        return $this->response_message('Student created', 201);
    }

    public function show($id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = new StudentResource(Student::find($id));
            return response($student, 202);
        } else {
            return $this->response_message('Student not found', 404);
        }
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->update($request->all());
            return $this->response_message('Student updated', 200);
        } else {
            return $this->response_message('Student not found', 404);
        }
    }

    public function destroy($id)
    {
        if (Student::where('id', $id)->exists()) {
            Student::destroy($id);
            return $this->response_message('Student deleted', 202);
        } else {
            return $this->response_message('Student not found', 404);
        }
    }
}
