@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('create_new_course') }}</title>
</head>
<body class="bg-gray-50">

<div class="lg:min-w-[800px] mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{ __('create_new_course') }}</h1>
    <form method="POST" action={{ route('admin.courses.store') }} enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Course Title -->
        <div>
            <label for="title" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('course_title') }}</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}" 
                required 
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="{{ __('course_title_placeholder') }}"
            >
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
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
                placeholder="{{ __('description_placeholder') }}"
            >{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Thumbnail -->
        <div>
            <label for="thumbnail" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('thumbnail') }}</label>
            <input 
                type="file" 
                name="thumbnail" 
                id="thumbnail" 
                required 
                class="block w-full text-gray-700 bg-gray-100 rounded-lg p-2 file:bg-blue-50 file:text-blue-700 file:py-2 file:px-4 file:rounded-lg file:font-medium hover:file:bg-blue-100"
            >
            @error('thumbnail')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-lg font-semibold text-gray-800 mb-2">{{ __('price') }}</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                value="{{ old('price') }}" 
                required 
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3"
                placeholder="{{ __('price_placeholder') }}"
            >
            @error('price')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium rounded-lg shadow-lg hover:from-blue-600 hover:to-blue-800"
        >
            {{ __('create_course') }}
        </button>
    </form>
</div>

</body>
</html>
@endsection
