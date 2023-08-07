<?php

namespace App\Http\Livewire\Tabel;

use App\Models\iterasi_c45 as iterasiC45;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class DaftarPerhitungan extends DataTableComponent
{
    protected $model = iterasiC45::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('No','id')->sortable()->searchable(),
            Column::make('Att Gain Ratio Max','atribut_gain_ratio_max')->sortable()->searchable(),
            Column::make('Atribut', 'atribut')->sortable()->searchable(),
            Column::make('Nilai Atribut', 'nilai_atribut')->sortable()->searchable(),
            Column::make('Total Kasus', 'jml_kasus_total')->sortable()->searchable(),
            Column::make('Jumlah Aktif', 'jml_aktif')->sortable()->searchable(),
            Column::make('Jumlah Tidak Aktif', 'jml_tdk_aktif')->sortable()->searchable(),
            Column::make('Entropy', 'entropy')->sortable()->searchable(),
            Column::make('Gain', 'inf_gain')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return iterasiC45::query();
    }
}
