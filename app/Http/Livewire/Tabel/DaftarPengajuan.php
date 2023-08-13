<?php

namespace App\Http\Livewire\Tabel;

use App\Http\Livewire\Components\Table;
use App\Http\Livewire\Components\Column;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use Illuminate\Database\Eloquent\Builder;

class DaftarPengajuan extends Table
{
    public function columns(): array
    {
        return [
            Column::make('Kode','code_mb'),
            Column::make('Nama','nama'),
            Column::make('Tempat Lahir', 'tempat_lahir'),
            Column::make('Tanggal Lahir', 'tgl_lahir'),
            Column::make('Kebangsaan', 'kebangsaan'),
            Column::make('Alamat', 'alamat'),
            Column::make('Kabupaten Kota', 'kabupaten_kota'),
            Column::make('No TLP', 'no_tlp'),
            Column::make('No KTP', 'no_ktp'),
            Column::make('Jabatan', 'jabatan'),
            Column::make('Virtual Account', 'va'),
            Column::make('Status', 'status')->component('statusPengajuan'),
            Column::make('Action', 'status')->component('statusPengajuan'),
        ];
    }

    public function query(): Builder
    {
        return MrMitraBinaan::query();
    }
}
