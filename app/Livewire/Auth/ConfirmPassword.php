<?php

namespace App\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ConfirmPassword extends Component
{
    public string $password = '';

    public function render()
    {
        return view('livewire.auth.confirm-password');
    }

    public function rules()
    {
        return [
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        if (!Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}
