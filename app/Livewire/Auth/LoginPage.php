<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login - ShopHeX')]

class LoginPage extends Component
{
    public $email;
    public $password;

    public function save()
    {
       $this->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|min:6|max:255',
       ]); 
       
        if (! Auth::attempt(['email' => $this->email , 'password' => $this->password])) {
            session()->flash('error' , 'The email or password you entered is incorrect. Please try again.');
            return;
        }

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
