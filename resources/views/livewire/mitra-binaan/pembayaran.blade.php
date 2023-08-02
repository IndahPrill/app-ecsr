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
                    <input type="text" id="code_mb" class="form-control" value="{{ Session::get('code_mb'); }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Nama Pemilik </label>
                    <input type="text" id="code_mb" class="form-control" value="" disabled>
                </div>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Nama Usaha </label>
                    <input type="text" id="code_mb" class="form-control" value="" disabled>
                </div>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Alanat Usaha </label>
                    <textarea id="code_mb" class="form-control" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Tanggal Kontrak </label>
                    <input type="text" id="code_mb" class="form-control" value="" disabled>
                </div>
                <div class="mb-3">
                    <label for="code_mb" class="col-form-label text-end text-end">Virtual Account </label>
                    <input type="text" id="code_mb" class="form-control" value="" disabled>
                </div>
                <div class="mb-3">
                    <label for="angsuran" class="col-form-label text-end">Angsuran Ke </label>
                    <input type="text" id="angsuran" class="form-control" value="" disabled>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <h2 class="h5 fw-bold mt-4 mb-3">Riwayat Pembayaran</h2>
                <livewire:users-table />
            </div>
        </div>
    </div>
</div>
