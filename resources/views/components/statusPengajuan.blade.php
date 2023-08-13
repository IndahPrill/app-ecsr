@props([
    'value'
])

<div class="flex">
    @if ($value == '0')
        <span class="badge bg-info">Pengajuan</span>
    @elseif ($value == '1')
        <span class="badge bg-secondary">Survei</span>
    @elseif ($value == '2')
        <span class="badge bg-success">Setuju</span>
    @elseif ($value == '3')
        <span class="badge bg-danger">Gagal</span>
    @endif
</div>
