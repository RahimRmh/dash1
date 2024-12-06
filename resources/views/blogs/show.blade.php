@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $blog->title }}</title>
</head>
<body class="bg-gray-100">
    <div class="mx-auto py-12 min-h-screen flex flex-col justify-center max-w-3xl rounded-lg">
        <!-- Blog Title -->
        <h1 class="text-5xl font-bold text-gray-800 mb-8 leading-tight px-6">
            {{ $blog->title }}
        </h1>

        <!-- Author and Date -->
        <div class="flex items-center text-gray-600 text-sm mb-6 justify-between px-6">
            <div>
                <p class="font-semibold text-gray-700">{{ __('By') }}: <span class="text-blue-500">{{ $blog->author }}</span></p>
                <p>{{ __('Published on') }}: <span class="font-medium text-gray-500">{{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}</span></p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-300 mb-8 mx-6"></div>

        <!-- Blog Content -->
        <p class="text-gray-700 text-lg leading-relaxed mb-10 px-6">
            {{ $blog->content }}
        </p>

        <!-- Back to Blogs -->
        <div class="px-6">
            <a href="{{ route('blogs.index') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold shadow-md hover:bg-blue-700 hover:shadow-lg transition">
                {{ __('Back to Blogs') }}
            </a>
        </div>
    </div>
</body>
</html>

@endsection
