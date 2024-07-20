<x-guest-layout>
    <div class="container mx-auto mt-10">
        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Vous avez oublié votre mot de passe ? Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra d’en choisir un nouveau.') }}
        </div>

        <!-- Statut de session -->
        <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

        <form method="POST" action="{{ route('password.email') }}" class="vstack gap-2 p-5 rounded-lg shadow-lg bg-white" style="width: 70%; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            @csrf

            <!-- Adresse e-mail -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="form-label"></x-input-label>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"></x-text-input>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"></x-input-error>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                    {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
