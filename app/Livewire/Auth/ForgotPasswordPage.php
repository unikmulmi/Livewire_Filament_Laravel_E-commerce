<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Passsword - ShopHeX')]

class ForgotPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
