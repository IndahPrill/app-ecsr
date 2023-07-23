<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Auth;
use Livewire\Component;
use App\Models\User;

class Logout extends Component
{

    public function logout() {
        User::where(['email' => auth()->user()->email])->update(['status_login' => '0']);
        auth()->logout();
        return redirect('/login');
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
