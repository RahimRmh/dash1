<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\StripeService;

class CourseController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }
 
    public function index()
    {
        $courses = Course::select('id', 'title','description', 'thumbnail', 'price')->paginate(10);
        return view('courses.index', compact('courses'));
    }



    public function show($id)
    {
        
        $course = Course::findOrFail($id);

        if (auth()->check() && auth()->user()->isEnrolledIn($course)) {
            $course->load('sections.videos');
        }

        return view('courses.show', compact('course'));
    }




  

    public function enroll($courseId)
    {
        $user = auth()->user();
        $course = Course::findOrFail($courseId);

        $checkoutSession = $this->stripeService->createCheckoutSession($course, $user->id);

        return redirect($checkoutSession->url);
    }

    public function success($userId, $courseId)
    {
        $user = auth()->user();

        if ($user->id != $userId) {
            return redirect()->route('courses')->with('error', 'Unauthorized access.');
        }

        $course = Course::findOrFail($courseId);

        $user->enroll($course);

        return redirect()->route('courses.show', $course->id)->with('success', 'You have successfully enrolled in the course!');
    }

    public function cancel()
    {
        return redirect()->route('courses.index')->with('error', 'Payment was canceled.');
    }


    
}
