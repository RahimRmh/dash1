@extends('layouts.app')

@section('content')

<section class="container mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">{{ __('blogs') }}</h1>
        <a href="{{ route('admin.blogs.create') }}" 
           class="bg-gradient-to-r from-green-500 to-green-700 text-white py-2 px-6 rounded-lg shadow-md hover:scale-105 transform transition">
            {{ __('add_new_blog') }}
        </a>
    </div>

    @if ($blogs->isEmpty())
        <div class="text-center text-gray-600 mt-20">
            <h2 class="text-2xl font-semibold">{{ __('no_blogs_available') }}</h2>
            <p class="mt-4">{{ __('click_to_create_blog') }}</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($blogs as $blog)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" 
                         class="w-full h-48 object-cover">              
                    <div class="p-6 space-y-4">
                        <h2 class="text-2xl font-bold text-gray-800 truncate">{{ $blog->title }}</h2>
                        <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">
                            {{ Str::limit($blog->content, 150, '...') }}
                        </p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" 
                               class="text-blue-600 hover:underline">
                               {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('{{ __('confirm_delete_blog') }}');">
                                    {{ __('delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
    @endif
</section>

@endsection
