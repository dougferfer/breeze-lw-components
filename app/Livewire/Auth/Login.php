<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Forms\Auth\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login(): void
    {
        $this->form->validate();
        
        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}
