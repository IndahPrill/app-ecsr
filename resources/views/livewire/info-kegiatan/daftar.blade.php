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
    @if (auth()->user()->user_level == '1' || auth()->user()->user_level == '2')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('info-kegiatan-tambah')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <i class="fa-solid fa-plus icon-xs me-2"></i>Tambah
        </a>
    </div>
    @endif
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table id="mmb-table" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('#mmb-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kegiatan.list') }}",
                dataSrc: function (json) {
                    var return_data = new Array();
                    var i = 1;
                    $.each(json.data, function (index, value) {
                        return_data.push({
                            'DT_RowIndex': value.DT_RowIndex,
                            'kode_kegiatan': value.kode_kegiatan,
                            'nama_kegiatan': value.nama_kegiatan,
                            'tgl_kegiatan_con': value.tgl_kegiatan_con,
                            'kategori_usaha': value.kategori_usaha,
                            'produk_usaha': value.produk_usaha,
                            'deskripsi_usaha': value.deskripsi_usaha,
                            'created_at_con': value.created_at_con,
                            'action': value.action
                        });
                        i++;
                    });
                    return return_data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'kode_kegiatan', name: 'kode_kegiatan' },
                { data: 'nama_kegiatan', name: 'nama_kegiatan' },
                { data: 'tgl_kegiatan_con', name: 'tgl_kegiatan_con' },
                { data: 'kategori_usaha', name: 'kategori_usaha' },
                { data: 'produk_usaha', name: 'produk_usaha' },
                { data: 'deskripsi_usaha', name: 'deskripsi_usaha' },
                { data: 'created_at_con', name: 'created_at_con' },
                { data: 'action', name: 'action', orderable: false }
            ]
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function edit(id) {
        if (id) {
            sessionStorage.setItem("id", id);
            location.href = "{{ route('info-kegiatan-edit') }}";
        }
    }
</script>
