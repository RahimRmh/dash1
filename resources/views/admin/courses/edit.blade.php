@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('edit_course') }}</title>
</head>
<body class="bg-gray-50">

<div class="lg:min-w-[800px] mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{ __('edit_course') }}</h1>
    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Course Title -->
        <div>
            <label for="title" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('course_title') }}</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                required 
                value="{{ old('title', $course->title) }}" 
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="{{ __('enter_course_title') }}"
            >
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('description') }}</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4" 
                required 
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="{{ __('enter_course_description') }}"
            >{{ old('description', $course->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Thumbnail -->
        <div>
            <label for="thumbnail" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('thumbnail') }}</label>
            <input 
                type="file" 
                name="thumbnail" 
                id="thumbnail" 
                class="block w-full text-gray-700 bg-gray-100 rounded-lg p-2 file:bg-blue-50 file:text-blue-700 file:py-2 file:px-4 file:rounded-lg file:font-medium hover:file:bg-blue-100"
            >
            @if($course->thumbnail)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Thumbnail" class="w-32 h-32 rounded-lg">
                </div>
            @endif
            @error('thumbnail')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('price') }}</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                required 
                value="{{ old('price', $course->price) }}"
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="{{ __('enter_course_price') }}"
            >
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium rounded-lg shadow-lg hover:from-blue-600 hover:to-blue-800"
        >
            {{ __('update_course') }}
        </button>
    </form>
</div>

</body>
</html>
@endsection
