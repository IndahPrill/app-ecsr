<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Register extends Component
{
    public $no_ktp = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
    }

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
            'email' => 'required',
            'password' => 'required|same:passwordConfirmation|min:6',
        ]);

        $qry = DB::select(DB::raw("SELECT 
                            MAX(SUBSTR(code_mb, 10, 5)) AS kode, SUBSTR(code_mb, 4, 2) AS day, SUBSTR(code_mb, 6, 2) AS month, SUBSTR(code_mb, 8, 2) as year
                        from
                            users 
                        where code_mb is not null
                            and SUBSTR( code_mb, 7, 2 ) = SUBSTR(YEAR(CURDATE()), 3, 2)
                        group by id
                        order by SUBSTR(code_mb, 10, 5) DESC"));

        $urutan = (int)$qry[0]->kode + 1;
        $urutan++;

        $kode = "MB";
        $day = date("d");
        $month = date("m");
        $year = substr(date("Y"), 2, 2);
        $kd_mb = $kode . $day . $month . $year . sprintf("%05s", $urutan); // MB04042023000001

        $user = User::create([
            'code_mb' => $kd_mb,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_valid' => '1',
            'remember_token' => Str::random(10),
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
