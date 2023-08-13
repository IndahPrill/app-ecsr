<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
{

    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    // public function mount()
    // {
    //     if (auth()->user()) {
    //         return redirect()->intended('/dashboard');
    //     }
    // }

    public function updatedEmail()
    {
        $this->validate(['email'=>'required|email:rfc,dns|unique:users']);
    }

    public function register()
    {
        $this->validate([
            'no_ktp' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|same:passwordConfirmation|min:6',
        ]);

        $qry = User::selectRaw('MAX(SUBSTR(code_mb, 10, 5)) AS kode, SUBSTR(code_mb, 4, 2) AS day, SUBSTR(code_mb, 6, 2) AS month, SUBSTR(code_mb, 8, 2) as year')
                    // ->whereRaw('SUBSTR(code_mb, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT(\'0\',DAY(CURDATE())),DAY(CURDATE())) AND SUBSTR(code_mb, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT(\'0\',MONTH(CURDATE())),MONTH(CURDATE())) AND SUBSTR(code_mb, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)')
                    ->where('code_mb', '!=' ,'null')
                    ->whereRaw('SUBSTR( code_mb, 7, 2 ) = SUBSTR(YEAR(CURDATE()), 3, 2)')
                    ->groupBy('id')
                    ->first();

        $urutan = (int) $qry->kode + 1;
        $urutan++;

        $kode = "MB";
        $day = date("d");
        $month = date("m");
        $year = substr(date("Y"), 2, 2);
        $kd_mb = $kode . $day . $month . $year . sprintf("%05s", $urutan); // MB04042023000001

        $user = User::create([
            'code_mb' =>$kd_mb,
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
            'email' =>$this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        auth()->login($user);

        return redirect('/profile');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
