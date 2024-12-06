<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    public function createCourse(array $validatedData)
    {
        $validatedData['thumbnail'] = $this->storeThumbnail($validatedData['thumbnail']);

        $course = Course::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'thumbnail' => $validatedData['thumbnail'],
            'price' => $validatedData['price'],
        ]);

       

        return $course;
    }

    
    // Method to update a course
    public function updateCourse(Course $course, array $validatedData): Course
    {
        if (isset($validatedData['thumbnail'])) {
            
            Storage::disk('public')->delete($course->thumbnail);
            
            $validatedData['thumbnail'] = $this->storeThumbnail($validatedData['thumbnail']);
        }
        
        $course->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'thumbnail' => $validatedData['thumbnail'] ?? $course->thumbnail,
            'price' => $validatedData['price'],
        ]);
        
        
        
        return $course;
    }
    
    private function storeThumbnail($thumbnail): string
    {
        if ($thumbnail instanceof \Illuminate\Http\UploadedFile) {
            return $thumbnail->store('courses_images', 'public');
        }

        throw new \Exception("Invalid thumbnail file.");
    }
  
}
