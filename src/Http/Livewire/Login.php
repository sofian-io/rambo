<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Rambo\RamboAuth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $error = '';

    public function render()
    {
        return view('rambo::livewire.login');
    }

    public function attemptLogin()
    {
        $this->error = '';
        if (RamboAuth::login($this->email, $this->password)) {
            return redirect('/admin');
        }

        $this->error = 'We could not log you in, please try again.';
    }
}
