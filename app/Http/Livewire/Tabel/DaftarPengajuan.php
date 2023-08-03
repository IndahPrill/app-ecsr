<?php

namespace App\Http\Livewire\Tabel;

use App\Models\m_mitra_binaan as MrMitraBinaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class DaftarPengajuan extends DataTableComponent
{
    protected $model = MrMitraBinaan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Kode','code_mb')->sortable()->searchable(),
            Column::make('Nama','nama')->sortable()->searchable(),
            Column::make('Tempat Lahir', 'tempat_lahir')->sortable()->searchable(),
            Column::make('Tanggal Lahir', 'tgl_lahir')->sortable()->searchable(),
            Column::make('Kebangsaan', 'kebangsaan')->sortable()->searchable(),
            Column::make('Alamat', 'alamat')->sortable()->searchable(),
            Column::make('Kabupaten Kota', 'kabupaten_kota')->sortable()->searchable(),
            Column::make('No TLP', 'no_tlp')->sortable()->searchable(),
            Column::make('No KTP', 'no_ktp')->sortable()->searchable(),
            Column::make('Jabatan', 'jabatan')->sortable()->searchable(),
            Column::make('Virtual Account', 'va')->sortable()->searchable(),
            BooleanColumn::make('Status Pengajuan', 'status')->setView('components.statusPengajuan')
        ];
    }

    public function query(): Builder
    {
        return MrMitraBinaan::query();
    }
}
