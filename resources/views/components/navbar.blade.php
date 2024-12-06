<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Learning Course') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body[dir="rtl"] {
            direction: rtl;
            text-align: right;
        }
        body[dir="ltr"] {
            direction: ltr;
            text-align: left;
        }
    </style>
</head>
<body>
    <header class="bg-[#2386c8] text-white p-4">
        <div class="flex justify-between items-center">
            <!-- Website Logo -->
            @if (auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold">{{ __('Learning Course') }}</a>
            @else
                <a href="/" class="text-2xl font-bold">{{ __('Learning Course') }}</a>
            @endif

            <!-- Navigation Links -->
            <div class="flex items-center gap-5">
                <ul class="flex items-center gap-5 font-medium relative">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <!-- Admin Links -->
                            <li>
                                <a class="hover:text-white/90" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li>
                                <a class="hover:text-white/90" href="{{ route('admin.courses.index') }}">{{ __('Manage Courses') }}</a>
                            </li>
                            <li>
                                <a class="hover:text-white/90" href="{{ route('admin.blogs.index') }}">{{ __('Manage Blogs') }}</a>
                            </li>
                        @else
                            <!-- Public Links for Authenticated Non-Admin Users -->
                            <li>
                                <a class="hover:text-white/90" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <a class="hover:text-white/90" href="{{ route('blogs.index') }}">{{ __('Blogs') }}</a>
                            </li>
                            <li>
                                <a class="hover:text-white/90" href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
                            </li>
                        @endif
                    @endauth

                    @guest
                        <!-- Public Links for Guests -->
                        <li>
                            <a class="hover:text-white/90" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <li>
                            <a class="hover:text-white/90" href="{{ route('blogs.index') }}">{{ __('Blogs') }}</a>
                        </li>
                        <li>
                            <a class="hover:text-white/90" href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="border px-4 py-1 rounded-lg font-semibold shadow-md hover:bg-[#3a97d6] transition duration-300">{{ __('Login') }}</a>
                        </li>
                    @else
                        <!-- Show logout link if the user is authenticated -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="border px-4 py-1 rounded-lg font-semibold shadow-md hover:bg-[#3a97d6] transition duration-300">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    @endguest
                </ul>

                <!-- Language Switcher -->
                <div class="flex gap-2">
                    <a href="{{ url('set-language/ar') }}" 
                        class="px-4 py-1 bg-white text-black rounded-md font-semibold hover:bg-gray-200 {{ app()->getLocale() === 'ar' ? 'bg-gray-300' : '' }}">
                        {{ __('AR') }}
                    </a>
                    <a href="{{ url('set-language/en') }}" 
                        class="px-4 py-1 bg-white text-black rounded-md font-semibold hover:bg-gray-200 {{ app()->getLocale() === 'en' ? 'bg-gray-300' : '' }}">
                        {{ __('EN') }}
                    </a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
