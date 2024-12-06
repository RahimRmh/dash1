@extends('layouts.app')

@section('content')
<section class="mx-auto py-10">
    <h1 class="text-4xl font-bold text-center mb-6">{{ isset($section) ? __('edit_section') : __('add_new_section') }}</h1>

    <form action="{{ isset($section) ? route('admin.sections.update', ['course_id' => $course->id, 'id' => $section->id]) : route('admin.sections.store', ['course_id' => $course->id]) }}" method="POST">
        @csrf
        @if(isset($section))
            @method('PUT')
        @endif

        <!-- Section Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-medium">{{ __('title') }}</label>
            <input type="text" name="title" id="title" value="{{ old('title', $section->title ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center gap-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600 transition">
                {{ isset($section) ? __('update_section') : __('create_section') }}
            </button>
        </div>
    </form>
</section>
@endsection
