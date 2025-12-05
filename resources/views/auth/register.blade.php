<x-guest-layout class="bg-[#DDE8FF] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Заголовок -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <h2 class="text-xl text-gray-700">Регистрация</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="bg-white rounded-lg shadow-md p-6">
            @csrf


            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Middlename -->
            <div class="mb-4">
                <x-input-label for="middlename" :value="__('Middlename')" />
                <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autocomplete="middlename" />
                <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
            </div>

            <!-- LastName -->
            <div class="mb-4">
                <x-input-label for="lastname" :value="__('Lastname')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Login -->
            <div class="mb-4">
                <x-input-label for="login" :value="__('Log in')" />
                <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autocomplete="login" />
                <x-input-error :messages="$errors->get('login')" class="mt-2" />
            </div>

            <!-- Tel -->
            <div class="mb-4">
                <x-input-label for="tel" :value="__('Tel')" />
                <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>