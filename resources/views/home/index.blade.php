@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('courses_list_title') }}</title>
</head>

<body>
    <x-courses-list :courses="$courses" title="{{ __('available_courses') }}" />
    <x-blog-list :blogs="$blogs" title="{{ __('latest_blog_posts') }}" />
</body>
</html>

@endsection
