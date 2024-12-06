@extends('layouts.app')

@section('content')

<section class="container mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">{{ __('courses_title') }}</h1>
        <a href="/admin/courses/create" 
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-6 rounded-lg shadow-md hover:scale-105 transform transition">
            {{ __('add_course') }}
        </a>
    </div>

    @if ($courses->isEmpty())
        <div class="text-center text-gray-600 mt-20">
            <h2 class="text-2xl font-semibold">{{ __('no_courses_available') }}</h2>
            <p class="mt-4">{{ __('add_course_instruction') }}</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $course->title }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $course->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="/admin/courses/{{ $course->id }}/edit" 
                               class="text-blue-500 hover:underline">
                               {{ __('edit') }}
                            </a>
                            <a href="/admin/courses/{{ $course->id }}/sections" 
                               class="text-green-500 hover:underline">
                               {{ __('sections') }}
                            </a>
                            <form action="/admin/courses/{{ $course->id }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:underline"
                                        onclick="return confirm('{{ __('delete_confirmation') }}')">
                                    {{ __('delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $courses->links() }}
        </div>
    @endif
</section>

@endsection
