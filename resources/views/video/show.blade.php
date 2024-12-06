@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Improved Comments Section') }}</title>
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-900">

    <div class="container mx-auto px-4 py-8">
        <!-- Static Video Title -->
        <h1 class="text-4xl font-bold text-center text-gray-900 mb-6">{{ $video->title }}</h1>

        <!-- Video Embed -->
        <div class="flex justify-center mb-8">
            @php
                $videoUrl = $video->video; // Assuming $video->video contains the URL
                $embedUrl = '';

                // Check if it's a YouTube URL
                if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/i', $videoUrl, $matches)) {
                    // Extract the YouTube video ID and create the embed URL
                    $videoId = $matches[1];
                    $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                }
                // Check if it's a full YouTube URL (https://www.youtube.com/watch?v=...)
                elseif (preg_match('/youtube\.com\/(?:[^\/\n\s]+\/\S+|(?:v|e(?:mbed)?)\/([^\/\n\s?=]+)/i', $videoUrl, $matches)) {
                    // Extract the YouTube video ID and create the embed URL
                    $videoId = isset($matches[1]) ? $matches[1] : $matches[2];
                    $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                }
            @endphp

            <!-- If embed URL is set, embed the video -->
            @if ($embedUrl)
                <iframe width="800" height="400" src="{{ $embedUrl }}" 
                    title="{{ __('YouTube video player') }}" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen class="rounded-xl shadow-md">
                </iframe>
            @else
                <p class="text-gray-500">{{ __('Video could not be embedded. Please check the video URL.') }}</p>
            @endif
        </div>

        <!-- Comments Section -->
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-2">{{ __('Comments') }}</h3>

            <!-- Loop through Comments -->
            @foreach($comments as $comment)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden">
                            <!-- User Avatar -->
                            <img src="https://www.w3schools.com/w3images/avatar2.png" alt="user" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <strong class="text-lg text-gray-800">{{ $comment->user->name }}</strong>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mt-3">{{ $comment->content }}</p>

                    <!-- Display Replies -->
                    @foreach($comment->replies as $reply)
                        <div class="ml-8 mt-4 space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden">
                                    <!-- User Avatar -->
                                    <img src="https://www.w3schools.com/w3images/avatar2.png" alt="user" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <strong class="text-sm text-gray-800">{{ $reply->user->name }}</strong>
                                    <p class="text-sm text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 ml-12">{{ $reply->content }}</p>
                        </div>
                    @endforeach

                    <!-- Reply Form -->
                    <form action="{{ route('comments.store') }}" method="POST" class="mt-4 flex items-start space-x-2 bg-gray-100 p-3 rounded-lg">
                        @csrf
                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <textarea name="content" class="form-control flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="{{ __('Reply...') }}"></textarea>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">{{ __('Reply') }}</button>
                    </form>
                </div>
            @endforeach

        </div>

        <!-- Add Comment Form -->
        <div class="bg-white p-6 rounded-xl shadow-lg mt-8">
            <h4 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Add a Comment') }}</h4>
            <form action="{{ route('comments.store') }}" method="POST" class="flex flex-col space-y-4">
                @csrf
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <textarea name="content" class="form-control p-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="{{ __('Write a comment...') }}"></textarea>
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>

</body>
</html>
@endsection
