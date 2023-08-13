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
                <li class="breadcrumb-item"><a href="#">Mitra Binaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
            </ol>
        </nav>
        <h2 class="h4">{{ $title }}</h2>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 fw-bold mt-4 mb-3">Data Mitra</h2>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Kode Mitra Binaan </label>
                    <input type="text" id="code_mb" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="col-form-label text-end text-end">Nama Pemilik </label>
                    <input type="text" id="nama" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="nm_usaha" class="col-form-label text-end text-end">Nama Usaha </label>
                    <input type="text" id="nm_usaha" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="col-form-label text-end text-end">Alanat Usaha </label>
                    <textarea id="alamat" class="form-control" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="va" class="col-form-label text-end text-end">Virtual Account </label>
                    <input type="text" id="va" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="angsuran" class="col-form-label text-end">Angsuran Ke </label>
                    <input type="text" id="angsuran" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <h2 class="h5 fw-bold mt-4 mb-3">Riwayat Pembayaran</h2>
                <table id="mmb-table" class="table table-centered table-nowrap mb-0 rounded">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Kode</th>
                            <th colspan="2">Tanggal</th>
                            <th rowspan="2">Jumlah Bayar</th>
                        </tr>
                        <tr>
                            <th>Pembayaran</th>
                            <th>Jatuh Tempo</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    let codemb = sessionStorage.getItem("codemb");
    $(function() {
        getMasterbayar()
        var table = $('#mmb-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'POST',
                url: "{{ route('list.detail.pembayaran') }}",
                data: {codemb: codemb},
                dataSrc: function (json) {
                    var return_data = new Array();
                    var i = 1;
                    $.each(json.data, function (index, value) {
                        return_data.push({
                            'DT_RowIndex': value.DT_RowIndex,
                            'code_mb': value.code_mb,
                            'tgl_bayar_convert': value.tgl_bayar_convert,
                            'tgl_jth_tmpo_convert': value.tgl_jth_tmpo_convert,
                            'jumlah': formatRupiah(value.jumlah.toString(), ''),
                        });
                        i++;
                    });
                    return return_data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'code_mb', name: 'code_mb' },
                { data: 'tgl_bayar_convert', name: 'tgl_bayar_convert' },
                { data: 'tgl_jth_tmpo_convert', name: 'tgl_jth_tmpo_convert' },
                { data: 'jumlah', name: 'jumlah' },
            ]
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

    function getMasterbayar() {
        $.ajax({
            type: 'POST',
            data: {codemb : codemb},
            url: "{{ route('list.master.pembayaran') }}",
            dataType: "json",
            // async: false,
            success: function(json) {
                console.log(json);

                if (json.status) {
                    $("#code_mb").val(json.data[0].code_mb)
                    $("#nama").val(json.data[0].nama)
                    $("#nm_usaha").val(json.data[0].nm_usaha)
                    $("#alamat").val(json.data[0].alamat)
                    $("#va").val(json.data[0].va)
                    $("#angsuran").val(json.data[0].angsuran)
                } else {
                    $("#code_mb").val('')
                    $("#nama").val('')
                    $("#nm_usaha").val('')
                    $("#alamat").val('')
                    $("#va").val('')
                    $("#angsuran").val('')
                }
            }
        })
    }
</script>
