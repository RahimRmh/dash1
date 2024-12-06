@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Course Details') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md mb-12">
        <!-- Course Title -->
        <h1 class="text-4xl font-extrabold text-gray-900 mb-6 text-center border-b pb-4">
            {{ $course->title }}
        </h1>

        <!-- Course Details Section -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Course Image -->
            <div class="flex justify-center items-start">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Thumbnail" class="rounded-lg shadow-md" style="max-width: 300px; height: auto;">
            </div>

            <!-- Course Info -->
            <div class="flex flex-col justify-center">
                <p class="text-lg text-gray-700 mb-4 leading-relaxed">
                    {{ $course->description }}
                </p>
                <p class="text-3xl font-bold text-gray-800 mb-6">${{ $course->price }}</p>
                
                @if (auth()->check() && !auth()->user()->isEnrolledIn($course) or !auth()->check())
                    <a href="{{ route('stripe.enroll', $course->id) }}"
                       class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-8 rounded-lg shadow-md text-center font-semibold hover:from-blue-600 hover:to-blue-800 hover:shadow-lg transition-all duration-300">
                        {{ __('Buy Now') }}
                    </a>
                @else
                    <p class="text-green-600 font-semibold text-lg">{{ __('You are already enrolled in this course!') }}</p>
                @endif
            </div>
        </div>

        <!-- Course Sections and Videos -->
        @if (auth()->check() && auth()->user()->isEnrolledIn($course))
            <div class="mt-10">
                @foreach ($course->sections as $section)
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center">
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full mr-2 w-6 text-sm h-6 flex items-center justify-center ">
                                {{ $loop->iteration }}
                            </span>
                            {{ $section->title }}
                        </h2>
                        <ul class="space-y-2 pl-6 border-l-2 border-gray-200">
                            @foreach ($section->videos as $video)
                                <li>
                                    <a href="{{ route('video.show', $video->id) }}" 
                                       class="text-lg text-blue-600 hover:text-blue-800 hover:underline">
                                        {{ $video->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>

@endsection
