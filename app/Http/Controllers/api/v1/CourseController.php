<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * response_message() can be found in Controller.php
 */

class CourseController extends Controller
{
    public function index()
    {
        // ray()->queries(); // Debugging purposes

        $query = QueryBuilder::for(Course::class)
                    ->allowedFilters(['title', 'code', 'efts', 'points'])
                    ->allowedSorts(['title', 'code', 'efts', 'points']);

        if ($query->count() > 0) {
            return CourseResource::collection(
                $query->paginate(25)
            );
        } else {
            return $this->response_message('Courses not found', 404);
        }
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());
        return $this->response_message('Course created', 201);
    }

    public function show($id)
    {
        if (Course::where('id', $id)->exists()) {
            $course = new CourseResource(Course::find($id));
            return response($course, 202);
        } else {
            return $this->response_message('Course not found', 404);
        }
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        if (Course::where('id', $id)->exists()) {
            $course = Course::find($id);
            $course->update($request->all());
            return $this->response_message('Course updated', 200);
        } else {
            return $this->response_message('Course not found', 404);
        }
    }

    public function destroy($id)
    {
        if (Course::where('id', $id)->exists()) {
            Course::destroy($id);
            return $this->response_message('Course deleted', 202);
        } else {
            return $this->response_message('Course not found', 404);
        }
    }
}
