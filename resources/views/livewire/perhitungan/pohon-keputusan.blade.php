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
</div>
<div class="card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-6">
                {!! $output !!}
            </div>
            <div class="col-lg-6 col-sm-6">
                <h4>Keterangan Hasil dari Pohon Keputusan:</h4>
                <hr>
                <span style="color: green;">Aktif :</span>
                Produk Aktif jauh lebih banyak dari Tidak Aktif..
                <br>

                <span style="color: red;">Tidak Aktif :</span>
                Produk Tidak Aktif jauh lebih banyak dari Aktif..
                <br>

                <span style="color: black;"><b>Kosong</b> :</span>
                Produk Aktif tidak ada, dan Tidak Aktif Pun Tidak ada,.
                <br>

                <span style="color: blue;">? :</span>
                Jumlah Produk Aktif dan Tidak Aktif Beda Tipis,.
                <br>
            </div>
        </div>
    </div>
</div>
