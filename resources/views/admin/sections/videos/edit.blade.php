@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-2xl mb-4">{{ __('edit_video_for_section', ['section_title' => $section->title]) }}</h1>

    <form action="{{ route('admin.sections.videos.update', [$section, $video]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700">{{ __('title') }}</label>
            <input type="text" name="title" id="title" class="border border-gray-300 p-2 w-full" value="{{ old('title', $video->title) }}" required>
        </div>
        
        <div class="mb-4">
            <label for="url" class="block text-gray-700">{{ __('video_url') }}</label>
            <input type="url" name="video" id="url" class="border border-gray-300 p-2 w-full" value="{{ old('video', $video->video) }}" required>
        </div>
        
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('update_video') }}</button>
    </form>
</div>
@endsection
