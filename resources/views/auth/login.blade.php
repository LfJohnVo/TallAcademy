<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-application-mark class="block w-auto h-100" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

    <div class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="sm:py-12">
            <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
                <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('https://codersfree.com/img/login/photo-1606660265514-358ebbadc80d.jfif')">
                </div>
                <div class="w-full min-h-screen sm:min-h-0 px-6 py-8 md:px-8 lg:w-1/2">
                    <x-jet-application-mark class="block w-auto h-100" />
                    <p text-xl text-center text-gray-600 dark:text-gray-200>¡Bienvenido de nuevo!</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
                        <p class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">Inicia sesión con tu email</p>
                        <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Correo') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">

                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                        </div>


                        <div class="block mt-2">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Login') }}
                            </x-jet-button>
                        </div>
                     </form>

                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
