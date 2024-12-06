@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <!-- Section Title -->
    <div class="flex items-center justify-between gap-5 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ __('videos_for_section', ['section_title' => $section->title]) }}</h1>
        <!-- Create New Video Button -->
        <a href="{{ route('admin.sections.videos.create', $section) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition">
            {{ __('create_new_video') }}
        </a>
    </div>

    <!-- Video List -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden w-fit mx-auto">
        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 border-b">{{ __('title') }}</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 border-b">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($videos as $video)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b text-gray-700">{{ $video->title }}</td>
                        <td class="px-6 py-4 border-b">
                            <div class="flex items-center space-x-4 gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.sections.videos.edit', [$section, $video]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                                    {{ __('edit') }}
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.sections.videos.destroy', [$section, $video]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
                                        {{ __('delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">{{ __('no_videos_available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
