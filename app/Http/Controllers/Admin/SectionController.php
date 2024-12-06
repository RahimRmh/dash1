<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Course;
use App\Models\Section;


class SectionController extends Controller
{

   
    public function index($course_id)
    {
        $sections = Section::where('course_id', $course_id)->get();
        $course = Course::findOrFail($course_id);
        return view('admin.sections.index', compact('sections', 'course')); 
    }

    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('admin.sections.form', compact('course')); 
    }


    public function store(StoreSectionRequest $request, $course_id)
    {
        $validatedData = $request->validated();
        $validatedData['course_id'] = $course_id;

 
       Section::create($validatedData);

        return redirect()->route('admin.sections.index', $course_id)
            ->with('success', 'Section and videos added successfully!');
    }


    public function edit($course_id, $id)
    {
        $section = Section::where('id', $id)->where('course_id', $course_id)->firstOrFail();
        $course = Course::findOrFail($course_id);
        return view('admin.sections.form', compact('section', 'course'));
    }

    public function update(UpdateSectionRequest $request, $course_id, $id)
    {
        $validatedData = $request->validated();

        $section = Section::where('id', $id)->where('course_id', $course_id)->firstOrFail();

        $section->update($validatedData);

        return redirect()->route('admin.sections.index', $course_id)
            ->with('success', 'Section updated successfully!');
    }


    public function destroy($course_id, $id)
    {
        $section = Section::where('id', $id)->where('course_id', $course_id)->firstOrFail();
        $section->delete();

        return redirect()->route('admin.sections.index', $course_id)
            ->with('success', 'Section deleted successfully!');
    }
}
