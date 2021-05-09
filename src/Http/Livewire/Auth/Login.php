<?php

namespace AngryMoustache\Rambo\Http\Livewire\Auth;

use AngryMoustache\Rambo\Facades\Rambo;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $error = '';

    public function render()
    {
        return view('rambo::livewire.auth.login');
    }

    public function attemptLogin()
    {
        $this->error = '';
        if (Rambo::login($this->email, $this->password)) {
            return redirect('/admin');
        }

        $this->error = 'We could not log you in, please try again.';
    }
}
