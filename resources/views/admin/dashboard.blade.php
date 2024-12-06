@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Dashboard') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="lg:min-w-[800px] mx-auto mt-10 p-8 rounded-lg flex flex-col gap-7">
    <div class="flex flex-col gap-2">
        <div class="bg-white p-6 rounded-lg shadow-xl flex items-center justify-between space-x-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Courses') }}</h3>
                <p class="text-4xl font-bold text-gray-800">{{ $totalCourses }}</p>
            </div>
            <div class="bg-blue-100 p-4 rounded-full">
                <i class="fas fa-book text-blue-600 text-4xl"></i>
            </div>
        </div>
        <a href="/admin/courses/create" class="w-full shadow-lg border sm:w-auto bg-blue-600 text-white py-3 px-8 rounded-lg text-center hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
            {{ __('Add New Course') }}
        </a>
    </div>

    <div class="flex flex-col gap-2">
        <div class="bg-white p-6 rounded-lg shadow-xl flex items-center justify-between space-x-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Blogs') }}</h3>
                <p class="text-4xl font-bold text-gray-800">{{ $totalBlogs }}</p>
            </div>
            <div class="bg-green-100 p-4 rounded-full">
                <i class="fas fa-pencil-alt text-green-600 text-4xl"></i>
            </div>
        </div>
        <a href="/admin/blogs/create" class="w-full sm:w-auto bg-green-600 text-white py-3 px-8 rounded-lg text-center hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
            {{ __('Add New Blog') }}
        </a>
    </div>
</div>

</body>
</html>
@endsection
