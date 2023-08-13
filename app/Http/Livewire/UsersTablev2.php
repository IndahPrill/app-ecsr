<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Components\Table;
use App\Http\Livewire\Components\Column;

class UsersTablev2 extends Table
{
    public function query() : Builder
    {
        return User::query();
    }

    public function columns() : array
    {
        return [
            Column::make('Nama Depan','first_name'),
            Column::make('Nama Belakang','last_name'),
            Column::make('E-mail', 'email'),
            Column::make('Alamat', 'address'),
            Column::make('Genre', 'genre')->component('columns.users.status'),
            Column::make('Created At', 'created_at')->component('columns.human-diff'),
            Column::make('Updated At', 'updated_at')->component('columns.human-diff'),
        ];
    }
}
