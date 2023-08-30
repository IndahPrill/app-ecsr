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
                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
            </ol>
        </nav>
        <h2 class="h4">{{ $title }}</h2>
    </div>
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table id="mmb-table" class="table table-centered table-nowrap mb-0 rounded">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode</th>
                <th rowspan="2">Nama</th>
                <th colspan="2">Tanggal</th>
                <th colspan="6">Kreditur</th>
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
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($data as $val)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $val->code_mb }}</td>
                <td>{{ $val->nama }}</td>
                <td>{{ $val->tgl_bayar }}</td>
                <td>{{ $val->tgl_jth_tmpo }}</td>
                <td>{{ $val->rencana }}</td>
                <td>{{ $val->jumlah }}</td>
                <td>{{ $val->kesanggupan }}</td>
                <td>{{ $val->angsuran_berjalan }}</td>
                <td>{{ $val->angsuran }}</td>
                <td>{{ $val->tunggakan }}</td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('#mmb-table').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf']
        });

        table.buttons().container().appendTo("#mmb-table_wrapper .col-md-6:eq(0)");
    });
</script>
