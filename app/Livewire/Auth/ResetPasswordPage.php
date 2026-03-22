<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reset Password - ShopHeX')]

class ResetPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
