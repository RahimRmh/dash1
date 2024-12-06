<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Services\CourseService;


class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = Course::select('id', 'title', 'description', 'thumbnail', 'price', 'status')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create() 
    {
        return view('admin.courses.create');
    }

        public function store(StoreCourseRequest $request)
        {
            $validated = $request->validated();

            $this->courseService->createCourse($validated);

            return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
        }



    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }


    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validated = $request->validated();

        $this->courseService->updateCourse($course, $validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }

    public function sections($id)
    {
        $course = Course::with('sections')->findOrFail($id);
        return view('admin.courses.sections', compact('course'));
    }


  

}
