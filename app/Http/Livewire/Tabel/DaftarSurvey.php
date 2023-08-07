<?php

namespace App\Http\Livewire\Tabel;

use App\Models\data_survey as dataSuervey;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class DaftarSurvey extends DataTableComponent
{
    protected $model = dataSuervey::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('No','id')->sortable()->searchable(),
            Column::make('Nama','nama')->sortable()->searchable(),
            Column::make('Alamat', 'alamat')->sortable()->searchable(),
            Column::make('Kabupaten Kota', 'wilayah')->sortable()->searchable(),
            Column::make('Tahun', 'tahun')->sortable()->searchable(),
            Column::make('Angsuran', 'angsuran')->sortable()->searchable(),
            Column::make('Status Klasifikasi', 'status_klasifikasi')->sortable()->searchable(),
            Column::make('Jenis Usaha', 'jenis_usaha')->sortable()->searchable(),
            Column::make('Status Usaha')->sortable()->searchable()->format(fn($value, $row, Column $column) => '<strong>'.$row->status_usaha.'</strong>')->html(),
        ];
    }

    public function query(): Builder
    {
        return dataSuervey::query();
    }
}
