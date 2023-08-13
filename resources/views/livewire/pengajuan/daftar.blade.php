<title>E-CSR - {{ $title }}</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
            </ol>
        </nav>
        <h2 class="h4">{{ $title }}</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('pengajuan-tambah')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <i class="fa-solid fa-plus icon-xs me-2"></i>Tambah
        </a>
    </div>
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table id="mmb-table" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Kebangsaan</th>
                <th>Alamat</th>
                <th>Kabupaten Kota</th>
                <th>No TLP</th>
                <th>No KTP</th>
                <th>Jabatan</th>
                <th>Virtual Account</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('#mmb-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('daftar.pengajuan') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'code_mb', name: 'code_mb' },
                { data: 'nama', name: 'nama' },
                { data: 'ttl', name: 'ttl' },
                { data: 'kebangsaan', name: 'kebangsaan' },
                { data: 'alamat', name: 'alamat' },
                { data: 'kabupaten_kota', name: 'kabupaten_kota' },
                { data: 'no_tlp', name: 'no_tlp' },
                { data: 'no_ktp', name: 'no_ktp' },
                { data: 'jabatan', name: 'jabatan' },
                { data: 'va', name: 'va' },
                { data: 'status', name: 'status' },
            ]
        });
    });
</script>
