<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form method="POST" action="{{ route('login') }}" class="bg-white p-5 rounded-4 shadow-lg" style="width: 400px;">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="form-label"></x-input-label>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"></x-text-input>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"></x-input-error>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="form-label"></x-input-label>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"></x-text-input>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"></x-input-error>
            </div>

            <!-- Remember Me -->
            <div class="mb-4 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-decoration-none text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="btn btn-primary">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
