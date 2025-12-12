<x-guest-layout class="bg-[#DDE8FF] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Заголовок -->
        <div class="text-center mb-8 flex flex-col items-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <h2 class="text-xl text-gray-700">Авторизация</h2>
            <img src="{{ Vite::asset('resources/images/pol.png') }}" alt="">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
            @csrf
            <!-- Login -->
            <div class="mb-6">
                <x-input-label for="login" :value="__('Login')" class="block text-sm font-medium text-gray-700 mb-2" />
                <x-text-input id="login" class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 border" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" />
                <x-input-error :messages="$errors->get('login')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 mb-2" />
                <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 border"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 h-4 w-4" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-6">
                <!-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif -->

                <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white font-medium py-3 px-6 rounded-lg shadow-sm transition-colors">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>