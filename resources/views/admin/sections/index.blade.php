@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-6xl py-10 px-6 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-center mb-8 text-gray-700">{{ __('manage_sections') }}</h1>

    <div class="text-right mb-6">
        <a href="{{ route('admin.sections.create', ['course_id' => $course->id]) }}" 
           class="inline-block bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition shadow-md">
            {{ __('add_new_section') }}
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-md bg-white">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700">
                    <th class="border border-gray-300 px-6 py-4 text-center">#</th>
                    <th class="border border-gray-300 px-6 py-4">{{ __('title') }}</th>
                    <th class="border border-gray-300 px-6 py-4 text-center">{{ __('videos') }}</th>
                    <th class="border border-gray-300 px-6 py-4 text-center">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($sections as $section)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-6 py-4">{{ $section->title }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <a href="{{ route('admin.sections.videos.index', ['section' => $section->id]) }}" 
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                {{ __('view_all_videos') }}
                            </a>
                        </td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <div class="flex justify-center space-x-3 gap-2">
                                <a href="{{ route('admin.sections.edit', ['course_id' => $course->id, 'id' => $section->id]) }}" 
                                   class="inline-block bg-blue-500 text-white py-1 px-4 rounded-lg hover:bg-blue-600 transition shadow-md">
                                    {{ __('edit') }}
                                </a>
                                <form action="{{ route('admin.sections.destroy', ['course_id' => $course->id, 'id' => $section->id]) }}" 
                                      method="POST" onsubmit="return confirm('{{ __('are_you_sure') }}');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition shadow-md">
                                        {{ __('delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
