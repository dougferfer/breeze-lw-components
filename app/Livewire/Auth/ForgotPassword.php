<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Forms\Auth\ForgotPasswordForm;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public ForgotPasswordForm $form;

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendPasswordResetLink(): void
    {
        $this->form->validate();

        $status = $this->form->send();

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('form.email', __($status));

            return;
        }

        $this->form->reset('email');

        session()->flash('status', __($status));
    }
}
