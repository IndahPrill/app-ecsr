@if ($status == '0')
    <span class="badge bg-info">Pengajuan</span>
@elseif ($status == '1')
    <span class="badge bg-secondary">Survei</span>
@elseif ($status == '2')
    <span class="badge bg-success">Setuju</span>
@elseif ($status == '3')
    <span class="badge bg-danger">Gagal</span>
@endif
