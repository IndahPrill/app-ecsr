<?php

namespace App\Http\Livewire\ListUser;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TambahUser extends Component
{
    public $first_name, $last_name, $email, $password, $address, $no_tlp, $no_ktp, $genre, $user_level;

    public function render()
    {
        $data['title'] = 'Tambah User';
        return view('livewire.list-user.tambah-user', $data);
    }

    public function resetFields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password ='';
        $this->address = '';
        $this->no_tlp = '';
        $this->no_ktp = '';
        $this->genres = '';
        $this->user_level = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'no_tlp' => 'required',
            'no_ktp' => 'required',
            'genre' => 'required',
            'user_level' => 'required', 
        ]);

        try {
            $qry = User::selectRaw('MAX(SUBSTR(code_mb, 10, 5)) AS kode, SUBSTR(code_mb, 4, 2) AS day, SUBSTR(code_mb, 6, 2) AS month, SUBSTR(code_mb, 8, 2) as year')
                        // ->whereRaw('SUBSTR(code_mb, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT(\'0\',DAY(CURDATE())),DAY(CURDATE())) AND SUBSTR(code_mb, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT(\'0\',MONTH(CURDATE())),MONTH(CURDATE())) AND SUBSTR(code_mb, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)')
                        ->where('code_mb', '!=' ,'null')
                        ->whereRaw('SUBSTR( code_mb, 7, 2 ) = SUBSTR(YEAR(CURDATE()), 3, 2)')
                        ->groupBy('id')
                        ->first();
            // dd(Hash::make($this->password));
            $urutan = (int) $qry->kode + 1;
            $urutan++;

            $kode = "MB";
            $day = date("d");
            $month = date("m");
            $year = substr(date("Y"), 2, 2);
            $kd_mb = $kode . $day . $month . $year . sprintf("%05s", $urutan); // MB04042023000001

            $user = User::create([
                'code_mb' =>$kd_mb,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'address' => $this->address,
                'no_tlp' => $this->no_tlp,
                'no_ktp' => $this->no_ktp,
                'genre' => $this->genre,
                'user_level' => $this->user_level,
            ]);
        
            session()->flash('success','Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error','Something goes wrong!! '.$e->getMessage());
        }
    }
}

