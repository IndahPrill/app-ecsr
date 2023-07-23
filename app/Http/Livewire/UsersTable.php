<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Depan','first_name')->sortable()->searchable(),
            Column::make('Nama Belakang','last_name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->sortable()->searchable(),
            Column::make('Alamat', 'address')->sortable()->searchable(),
            Column::make('Created At', 'created_at')->sortable()->searchable(),
            Column::make('Updated At', 'updated_at')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return User::query();
    }
}
