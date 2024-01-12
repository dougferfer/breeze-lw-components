<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Actions\Logout as ActionLogout;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout(ActionLogout $logout)
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}
