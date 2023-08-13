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
                <li class="breadcrumb-item"><a href="#">Mitra Bunaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
            </ol>
        </nav>
        <h2 class="h4">{{ $title }}</h2>
    </div>
    <!-- <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('mitra-binaan-tambah') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <i class="fa-solid fa-plus icon-xs me-2"></i>
            Tambah
        </a>
    </div> -->
</div>
<div class="card card-body shadow table-wrapper table-responsive">
    <table id="mmb-table" class="table table-centered table-nowrap mb-0 rounded">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode</th>
                <th rowspan="2">Nama</th>
                <th colspan="2">Tanggal</th>
                <th colspan="6">Kreditur</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <th>Jatuh Tempo</th>
                <th>Pinjaman</th>
                <th>Jumlah Bayar</th>
                <th>Lama Bayar</th>
                <th>Angsuran Ke</th>
                <th>Sudah Bayar</th>
                <th>Tunggakan</th>
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
                url: "{{ route('mitra.binaan.list') }}",
                dataSrc: function (json) {
                    var return_data = new Array();
                    var i = 1;
                    $.each(json.data, function (index, value) {
                        return_data.push({
                            'DT_RowIndex': value.DT_RowIndex,
                            'code_mb': value.code_mb,
                            'nama': value.nama,
                            'tgl_bayar_convert': value.tgl_bayar_convert,
                            'tgl_jth_tmpo_convert': value.tgl_jth_tmpo_convert,
                            'rencana': formatRupiah(value.rencana.toString(), ''),
                            'jumlah': formatRupiah(value.jumlah.toString(), ''),
                            'kesanggupan': value.kesanggupan,
                            'angsuran_berjalan': value.angsuran_berjalan,
                            'angsuran': value.angsuran,
                            'tunggakan': value.tunggakan,
                            'action': value.action
                        });
                        i++;
                    });
                    return return_data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'code_mb', name: 'code_mb' },
                { data: 'nama', name: 'nama' },
                { data: 'tgl_bayar_convert', name: 'tgl_bayar_convert' },
                { data: 'tgl_jth_tmpo_convert', name: 'tgl_jth_tmpo_convert' },
                { data: 'rencana', name: 'rencana' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'kesanggupan', name: 'kesanggupan' },
                { data: 'angsuran_berjalan', name: 'angsuran_berjalan' },
                { data: 'angsuran', name: 'angsuran' },
                { data: 'tunggakan', name: 'tunggakan' },
                {
                    data: 'action',
                    name: 'action',
                    // render: function(data, type, full, meta) {
                    //     return '<a href="' + data + '" class="btn btn-primary">Edit</a>';
                    // },
                    orderable: false,
                }
            ]
        });
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }

    function detail(code) {
        if (code) {
            sessionStorage.setItem("codemb", code);
            location.href = "{{ route('mitra-binaan-pembayaran') }}";
        }
    }
</script>
