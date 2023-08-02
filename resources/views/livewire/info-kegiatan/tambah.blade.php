<title>E-CSR - {{ $title }}</title>
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    @if (auth()->user()->user_level == '1' || auth()->user()->user_level == '2')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">{{ $title }}</h1>
        </div>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form class="form-horizontal" wire:submit.prevent="store" method="POST">
                    <div class="row mb-4 mt-4">
                        <div class="col-lg-2 col-sm-2"></div>
                        <div class="col-lg-10 col-sm-6">
                            <div class="mb-3 row">
                                <label for="nama_kegiatan" class="col-sm-3 col-form-label text-end text-end">Nama Kegitan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" wire:model="nama_kegiatan" id="nama_kegiatan" required="" placeholder="Masukkan Nama Kegitan" autocomplete="off" />
                                    @error('nama_kegiatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tgl_kegiatan" class="col-sm-3 col-form-label text-end">Tanggal Kegiatan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar icon icon-xs"></i></span>
                                        <input type="text" class="form-control @error('tgl_kegiatan') is-invalid @enderror" wire:model="tgl_kegiatan" id="tgl_kegiatan" required="" placeholder="mm/dd/yyyy" data-datepicker="" />
                                        @error('tgl_kegiatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ktgr_usaha" class="col-sm-3 col-form-label text-end">Kategori Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('ktgr_usaha') is-invalid @enderror" wire:model="ktgr_usaha" id="ktgr_usaha" aria-label="Default select example">
                                        <option selected>--PILIH--</option>
                                        <option value="1">Industri</option>
                                        <option value="2">Perdagangan</option>
                                        <option value="3">Pertanian</option>
                                        <option value="4">Perkebunan</option>
                                        <option value="5">Peternakan</option>
                                        <option value="6">Jasa</option>
                                    </select>
                                    @error('ktgr_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="produk_usaha" class="col-sm-3 col-form-label text-end">Produk Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('produk_usaha') is-invalid @enderror" wire:model="produk_usaha" id="produk_usaha" required="" placeholder="Masukkan Produk Usaha" />
                                    @error('produk_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="desk_kegiatan" class="col-sm-3 col-form-label text-end">Deskripsi Kegiatan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <textarea class="form-control @error('desk_kegiatan') is-invalid @enderror" wire:model="desk_kegiatan" id="desk_kegiatan" rows="4"></textarea>
                                    @error('desk_kegiatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
