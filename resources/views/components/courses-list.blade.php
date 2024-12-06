<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('page_title') }}</title>
</head>
<body>
   <section class="mx-auto py-10 w-[90%]">
    <h1 class="text-4xl font-bold text-center mb-12">{{ $title }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        @foreach ($courses as $course)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ __('course_image_alt') }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-2xl font-bold mb-2">{{ $course->title }}</h2>
                    <p class="text-gray-600 mb-4 truncate">{{ $course->description }}</p>
                    <a href="/courses/{{ $course->id }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                        {{ __('learn_more') }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10 text-center">
        <a href="/courses" class="bg-green-500 text-white font-medium py-2 px-6 rounded-lg hover:bg-green-600 transition">
            {{ __('all_courses') }}
        </a>
    </div>
</section>

</body>
</html>
