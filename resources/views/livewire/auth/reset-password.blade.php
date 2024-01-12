<div>
    <form wire:submit="resetPassword">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                            class="block mt-1 w-full" 
                            type="email" 
                            name="email" 
                            wire:model="form.email"
                            readonly required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" 
                            class="block mt-1 w-full" 
                            type="password" 
                            name="password"
                            wire:model="form.password" 
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation"
                            class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            wire:model="form.password_confirmation" 
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('form.password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div>
