@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Register') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="mx-auto">
    <section class="py-10 min-h-screen flex items-center justify-center lg:min-w-[450px]">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="{{ __('Enter your name') }}" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="{{ __('Enter your email') }}" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="{{ __('Enter your password') }}" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="{{ __('Confirm your password') }}" required>
                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition duration-300 mb-4">
                    {{ __('Register') }}
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-gray-600 text-sm">{{ __("Do you have an account?") }}</p>
                <a href="{{ route('auth.login') }} "
                   class="text-blue-500 font-medium hover:underline mt-2 inline-block">
                   {{ __('Login') }}
                </a>
            </div>
        </div>
    </section>
</body>
</html>

@endsection
