@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl mb-4">{{ __('create_video_for_section', ['section_title' => $section->title]) }}</h1>

    <form action="{{ route('admin.sections.videos.store', $section) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">{{ __('title') }}</label>
            <input type="text" name="title" id="title" class="border border-gray-300 p-2 w-full" required>
        </div>
        
        <div class="mb-4">
            <label for="video" class="block text-gray-700">{{ __('video_url') }}</label>
            <input type="url" name="video" id="video" class="border border-gray-300 p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('create_video') }}</button>
    </form>
</div>

@endsection
