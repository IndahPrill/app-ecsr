<div>
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
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">{{ $title }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! session('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#dt_pribadi" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                                <p>Data Pribadi</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#dt_usaha" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                                <p>Data Usaha</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#dt_ahli_waris" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                                <p>Data Ahli Waris</p>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content {{ $currentStep != 1 ? 'd-none' : '' }}" id="dt_pribadi">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h4> Data Pribadi</h4>

                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-2 col-sm-2"></div>
                                    <div class="col-lg-10 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="dp_nama_pemilik" class="col-sm-3 col-form-label text-end text-end">Nama Pemilik <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" wire:model="code_mb" id="code_mb" value="{{ Session::get('code_mb'); }}">
                                                <input type="text" class="form-control @error('dp_nama_pemilik') is-invalid @enderror" wire:model="dp_nama_pemilik" id="dp_nama_pemilik" required="" placeholder="Masukkan Nama Pemilik" />
                                                @error('dp_nama_pemilik') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_tempat_lahir" class="col-sm-3 col-form-label text-end">Tempat Tanggal Lahir <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control @error('dp_tempat_lahir') is-invalid @enderror" wire:model="dp_tempat_lahir" id="dp_tempat_lahir" required="" placeholder="Masukkan Tempat Lahir" />
                                                @error('dp_tempat_lahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control @error('dp_tgl_lahir') is-invalid @enderror" wire:model="dp_tgl_lahir" id="dp_tgl_lahir" required="" placeholder="mm/dd/yyyy" />
                                                    @error('dp_tgl_lahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_kebangsaan" class="col-sm-3 col-form-label text-end">Kebangsaan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('dp_kebangsaan') is-invalid @enderror" wire:model="dp_kebangsaan" id="dp_kebangsaan" required="" placeholder="Masukkan Kebangsaan" />
                                                @error('dp_kebangsaan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_alamat" class="col-sm-3 col-form-label text-end">Alamat <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control @error('dp_alamat') is-invalid @enderror" placeholder="Masukkan Alamat" wire:model="dp_alamat" id="dp_alamat" rows="2"></textarea>
                                                @error('dp_alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_no_tlp" class="col-sm-3 col-form-label text-end">No Telepon <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('dp_no_tlp') is-invalid @enderror" wire:model="dp_no_tlp" id="dp_no_tlp" required="" placeholder="Masukkan Nomor Telepon" />
                                                @error('dp_no_tlp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_no_ktp" class="col-sm-3 col-form-label text-end">No KTP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('dp_no_ktp') is-invalid @enderror" wire:model="dp_no_ktp" id="dp_no_ktp" required="" placeholder="Masukkan Nomor KTP" />
                                                @error('dp_no_ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_jabatan" class="col-sm-3 col-form-label text-end">Jabatan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('dp_jabatan') is-invalid @enderror" wire:model="dp_jabatan" id="dp_jabatan" required="" placeholder="Masukkan Jabatan" />
                                                @error('dp_jabatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary nextBtn pull-right" type="button" wire:click="firstStepSubmit">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content {{ $currentStep != 2 ? 'd-none' : '' }}" id="dt_usaha">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h4> Data Usaha</h4>

                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="du_nama_usaha" class="col-sm-4 col-form-label text-end">Nama Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_nama_usaha') is-invalid @enderror" wire:model="du_nama_usaha" id="du_nama_usaha" required="" placeholder="Masukkan Nama Usaha" />
                                                @error('du_nama_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_npwp" class="col-sm-4 col-form-label text-end">NPWP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_npwp') is-invalid @enderror" wire:model="du_npwp" id="du_npwp" required="" placeholder="Masukkan NPWP" />
                                                @error('du_npwp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_tahun_usaha" class="col-sm-4 col-form-label text-end">Tahun Mulai Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_tahun_usaha') is-invalid @enderror" wire:model="du_tahun_usaha" id="du_tahun_usaha" required="" placeholder="Masukkan Tahun Mulai Usaha" pattern="{4}" />
                                                @error('du_tahun_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_alamat_usaha" class="col-sm-4 col-form-label text-end">Alamat Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control @error('du_alamat_usaha') is-invalid @enderror" placeholder="Masukkan Alamat Usaha" wire:model="du_alamat_usaha" id="du_alamat_usaha" rows="2"></textarea>
                                                @error('du_alamat_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_sektor_usaha" class="col-sm-4 col-form-label text-end">Sektor Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_sektor_usaha') is-invalid @enderror" wire:model="du_sektor_usaha" id="du_sektor_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Industri</option>
                                                    <option value="2">Perdagangan</option>
                                                    <option value="3">Pertanian</option>
                                                    <option value="4">Perkebunan</option>
                                                    <option value="5">Peternakan</option>
                                                    <option value="6">Jasa</option>
                                                </select>
                                                @error('du_sektor_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_produk_usaha" class="col-sm-4 col-form-label text-end">Produk <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_produk_usaha') is-invalid @enderror" wire:model="du_produk_usaha" id="du_produk_usaha" required="" placeholder="Masukkan Produk" />
                                                @error('du_produk_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kapasitas_produksi" class="col-sm-4 col-form-label text-end">Kapasitas Produksi <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_kapasitas_produksi') is-invalid @enderror" wire:model="du_kapasitas_produksi" id="du_kapasitas_produksi" required="" placeholder="Masukkan Kapasitas Produksi" />
                                                @error('du_kapasitas_produksi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_sarana_usaha" class="col-sm-4 col-form-label text-end">Sarana Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_sarana_usaha') is-invalid @enderror" wire:model="du_sarana_usaha" id="du_sarana_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Milik Sendiri</option>
                                                    <option value="2">Badan Usaha</option>
                                                </select>
                                                @error('du_sarana_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_modal_usaha" class="col-sm-4 col-form-label text-end">Jumlah Modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_modal_usaha') is-invalid @enderror" wire:model="du_jml_modal_usaha" id="du_jml_modal_usaha" required="" placeholder="Masukkan Jumlah Modal Usaha" />
                                                @error('du_jml_modal_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_asal_modal_usaha" class="col-sm-4 col-form-label text-end">Asal modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_asal_modal_usaha') is-invalid @enderror" wire:model="du_asal_modal_usaha" id="du_asal_modal_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Bantuan Pemerintah (Hibah)</option>
                                                    <option value="2">Pinjaman Pemerintah</option>
                                                    <option value="2">Pinjaman Bank</option>
                                                </select>
                                                @error('du_asal_modal_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="du_jml_aset_usaha" class="col-sm-4 col-form-label text-end">Jumlah Aset Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_aset_usaha') is-invalid @enderror" wire:model="du_jml_aset_usaha" id="du_jml_aset_usaha" required="" placeholder="Masukkan Jumlah Aset Usaha" />
                                                @error('du_jml_aset_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_omset_bulan" class="col-sm-4 col-form-label text-end">Omzet Perbulan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_omset_bulan') is-invalid @enderror" wire:model="du_jml_omset_bulan" id="du_jml_omset_bulan" required="" placeholder="Masukkan Omzet Perbulan" />
                                                @error('du_jml_omset_bulan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_laba_bersih" class="col-sm-4 col-form-label text-end">Laba/Keuntungan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_laba_bersih') is-invalid @enderror" wire:model="du_laba_bersih" id="du_laba_bersih" required="" placeholder="Masukkan Laba/Keuntungan" />
                                                @error('du_laba_bersih') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_tenaga_kerja" class="col-sm-4 col-form-label text-end">Jumlah Tenaga kerja <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_tenaga_kerja') is-invalid @enderror" wire:model="du_jml_tenaga_kerja" id="du_jml_tenaga_kerja" required="" placeholder="Masukkan Jumlah Tenaga kerja" />
                                                @error('du_jml_tenaga_kerja') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_riwayat_usaha" class="col-sm-4 col-form-label text-end">Riwayat Singkat Perusahaan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_riwayat_usaha') is-invalid @enderror" wire:model="du_riwayat_usaha" id="du_riwayat_usaha" required="" placeholder="Masukkan Riwayat Singkat Perusahaan" />
                                                @error('du_riwayat_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_rencana_usaha" class="col-sm-4 col-form-label text-end">Rencana Pengembangan Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_rencana_usaha') is-invalid @enderror" wire:model="du_rencana_usaha" id="du_rencana_usaha" required="" placeholder="Masukkan Rencana Pengembangan Usaha" />
                                                @error('du_rencana_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_alasan_peminjaman" class="col-sm-4 col-form-label text-end">Alasan Pinjaman Modal kerja <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control @error('du_alasan_peminjaman') is-invalid @enderror" placeholder="Masukkan Alasan Pinjaman Modal Kerja" wire:model="du_alasan_peminjaman" id="du_alasan_peminjaman" rows="2"></textarea>
                                                @error('du_alasan_peminjaman') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kebutuhan_modal" class="col-sm-4 col-form-label text-end">Kebutuhan Pinjaman Modal <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_kebutuhan_modal') is-invalid @enderror" wire:model="du_kebutuhan_modal" id="du_kebutuhan_modal" required="" placeholder="Masukkan Kebutuhan Pinjaman Modal" />
                                                @error('du_kebutuhan_modal') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_penggunaan_modal" class="col-sm-4 col-form-label text-end">Penggunaan Modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_penggunaan_modal') is-invalid @enderror" wire:model="du_penggunaan_modal" id="du_penggunaan_modal" required="" placeholder="Masukkan Penggunaan Modal Usaha" />
                                                @error('du_penggunaan_modal') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kesanggupan_angsuran" class="col-sm-4 col-form-label text-end">Kesanggupan Mengansur <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_kesanggupan_angsuran') is-invalid @enderror" wire:model="du_kesanggupan_angsuran" id="du_kesanggupan_angsuran" required="" placeholder="Masukkan Kesanggupan Mengansur" />
                                                @error('du_kesanggupan_angsuran') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger nextBtn pull-right" type="button" wire:click="back(1)">Previous</button>
                                <button class="btn btn-primary nextBtn pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content {{ $currentStep != 3 ? 'd-none' : '' }}" id="dt_ahli_waris">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h4> Data Ahli Waris</h4>

                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-2 col-sm-2"></div>
                                    <div class="col-lg-10 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="aw_nama" class="col-sm-3 col-form-label text-end text-end">Nama Lengkap <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_nama') is-invalid @enderror" wire:model="aw_nama" id="aw_nama" required="" placeholder="Masukkan Nama Lengkap" autocomplete="off" />
                                                @error('aw_nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_ttl" class="col-sm-3 col-form-label text-end">Tempat Tanggal Lahir <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control @error('aw_tempat_lahir') is-invalid @enderror" wire:model="aw_tempat_lahir" id="aw_tempat_lahir" required="" placeholder="Masukkan Tempat Lahir" />
                                                @error('aw_tempat_lahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input type="date" class="form-control @error('aw_tgl_lahir') is-invalid @enderror" wire:model="aw_tgl_lahir" id="aw_tgl_lahir" required="" placeholder="mm/dd/yyyy" />
                                                    @error('dp_tgl_lahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_alamat" class="col-sm-3 col-form-label text-end">Alamat <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control @error('aw_alamat') is-invalid @enderror" placeholder="Masukkan Alamat" wire:model="aw_alamat" id="aw_alamat" rows="2"></textarea>
                                                @error('aw_alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_hubungan" class="col-sm-3 col-form-label text-end">Hubungan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_hubungan') is-invalid @enderror" wire:model="aw_hubungan" id="aw_hubungan" required="" placeholder="Masukkan Hubungan" />
                                                @error('aw_hubungan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_no_tlp" class="col-sm-3 col-form-label text-end">No Telepon <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('aw_no_tlp') is-invalid @enderror" wire:model="aw_no_tlp" id="aw_no_tlp" required="" placeholder="Masukkan Nomor Telepon" />
                                                @error('aw_no_tlp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_no_ktp" class="col-sm-3 col-form-label text-end">No KTP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('aw_no_ktp') is-invalid @enderror" wire:model="aw_no_ktp" id="aw_no_ktp" required="" placeholder="Masukkan Nomor KTP" />
                                                @error('aw_no_ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger nextBtn pull-right" type="button" wire:click="back(2)">Previous</button>
                                <button class="btn btn-success pull-right" type="button" wire:click="store">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <form class="form-horizontal" wire:submit.prevent="store" method="POST">
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! session('success') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {!! session('error') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-pribadi-tab" data-bs-toggle="tab" data-bs-target="#nav-pribadi" type="button" role="tab" aria-controls="nav-pribadi" aria-selected="true">Data Pribadi</button>
                                <button class="nav-link" id="nav-usaha-tab" data-bs-toggle="tab" data-bs-target="#nav-usaha" type="button" role="tab" aria-controls="nav-usaha" aria-selected="false">Data Usaha</button>
                                <button class="nav-link" id="nav-ahliWaris-tab" data-bs-toggle="tab" data-bs-target="#nav-ahliWaris" type="button" role="tab" aria-controls="nav-ahliWaris" aria-selected="false">Ahli Waris</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-pribadi" role="tabpanel" aria-labelledby="nav-pribadi-tab">
                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-2 col-sm-2"></div>
                                    <div class="col-lg-10 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="dp_nama_pemilik" class="col-sm-3 col-form-label text-end text-end">Nama Pemilik <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" wire:model="code_mb" id="code_mb" value="{{ Session::get('code_mb'); }}">
                                                <input type="text" class="form-control @error('dp_nama_pemilik') is-invalid @enderror" wire:model="dp_nama_pemilik" id="dp_nama_pemilik" required="" placeholder="Masukkan Nama Pemilik" autocomplete="off" />
                                                @error('dp_nama_pemilik') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_ttl" class="col-sm-3 col-form-label text-end">Tempat Tanggal Lahir <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control @error('dp_tempat') is-invalid @enderror" wire:model="dp_tempat" id="dp_tempat" required="" placeholder="Masukkan Tempat Lahir" />
                                                @error('dp_tempat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-calendar icon icon-xs"></i>
                                                    </span>
                                                    <input type="text" class="form-control @error('dp_tgl_lahir') is-invalid @enderror" wire:model="dp_tgl_lahir" id="dp_tgl_lahir" required="" placeholder="mm/dd/yyyy" data-datepicker="" />
                                                    @error('dp_tgl_lahir') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_kebangsaan" class="col-sm-3 col-form-label text-end">Kebangsaan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('dp_kebangsaan') is-invalid @enderror" wire:model="dp_kebangsaan" id="dp_kebangsaan" required="" placeholder="Masukkan Kebangsaan" />
                                                @error('dp_kebangsaan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_alamat" class="col-sm-3 col-form-label text-end">Alamat <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('dp_alamat') is-invalid @enderror" wire:model="dp_alamat" id="dp_alamat" required="" placeholder="Masukkan Alamat" />
                                                @error('dp_alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_no_tlp" class="col-sm-3 col-form-label text-end">No Telepon <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('dp_no_tlp') is-invalid @enderror" wire:model="dp_no_tlp" id="dp_no_tlp" required="" placeholder="Masukkan Nomor Telepon" />
                                                @error('dp_no_tlp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_no_ktp" class="col-sm-3 col-form-label text-end">No KTP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('dp_no_ktp') is-invalid @enderror" wire:model="dp_no_ktp" id="dp_no_ktp" required="" placeholder="Masukkan Nomor KTP" />
                                                @error('dp_no_ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="dp_jabatan" class="col-sm-3 col-form-label text-end">Jabatan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('dp_jabatan') is-invalid @enderror" wire:model="dp_jabatan" id="dp_jabatan" required="" placeholder="Masukkan Jabatan" />
                                                @error('dp_jabatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-usaha" role="tabpanel" aria-labelledby="nav-usaha-tab">
                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="du_nama_usaha" class="col-sm-4 col-form-label text-end">Nama Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_nama_usaha') is-invalid @enderror" wire:model="du_nama_usaha" id="du_nama_usaha" required="" placeholder="Masukkan Nama Usaha" autocomplete="off" />
                                                @error('du_nama_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_npwp" class="col-sm-4 col-form-label text-end">NPWP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_npwp') is-invalid @enderror" wire:model="du_npwp" id="du_npwp" required="" placeholder="Masukkan NPWP" />
                                                @error('du_npwp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_tahun_usaha" class="col-sm-4 col-form-label text-end">Tahun Mulai Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_tahun_usaha') is-invalid @enderror" wire:model="du_tahun_usaha" id="du_tahun_usaha" required="" placeholder="Masukkan Tahun Mulai Usaha" />
                                                @error('du_tahun_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_alamat_usaha" class="col-sm-4 col-form-label text-end">Alamat Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_alamat_usaha') is-invalid @enderror" wire:model="du_alamat_usaha" id="du_alamat_usaha" required="" placeholder="Masukkan Alamat Usaha" />
                                                @error('du_alamat_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_sektor_usaha" class="col-sm-4 col-form-label text-end">Sektor Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_sektor_usaha') is-invalid @enderror" wire:model="du_sektor_usaha" id="du_sektor_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Industri</option>
                                                    <option value="2">Perdagangan</option>
                                                    <option value="3">Pertanian</option>
                                                    <option value="4">Perkebunan</option>
                                                    <option value="5">Peternakan</option>
                                                    <option value="6">Jasa</option>
                                                </select>
                                                @error('du_sektor_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_produk_usaha" class="col-sm-4 col-form-label text-end">Produk <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_produk_usaha') is-invalid @enderror" wire:model="du_produk_usaha" id="du_produk_usaha" required="" placeholder="Masukkan Produk" />
                                                @error('du_produk_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kapasitas_produksi" class="col-sm-4 col-form-label text-end">Kapasitas Produksi <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_kapasitas_produksi') is-invalid @enderror" wire:model="du_kapasitas_produksi" id="du_kapasitas_produksi" required="" placeholder="Masukkan Kapasitas Produksi" />
                                                @error('du_kapasitas_produksi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_sarana_usaha" class="col-sm-4 col-form-label text-end">Sarana Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_sarana_usaha') is-invalid @enderror" wire:model="du_sarana_usaha" id="du_sarana_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Milik Sendiri</option>
                                                    <option value="2">Badan Usaha</option>
                                                </select>
                                                @error('du_sarana_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_modal_usaha" class="col-sm-4 col-form-label text-end">Jumlah Modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_modal_usaha') is-invalid @enderror" wire:model="du_jml_modal_usaha" id="du_jml_modal_usaha" required="" placeholder="Masukkan Jumlah Modal Usaha" />
                                                @error('du_jml_modal_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_asal_modal_usaha" class="col-sm-4 col-form-label text-end">Asal modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-select @error('du_asal_modal_usaha') is-invalid @enderror" wire:model="du_asal_modal_usaha" id="du_asal_modal_usaha">
                                                    <option selected>--PILIH--</option>
                                                    <option value="1">Bantuan Pemerintah (Hibah)</option>
                                                    <option value="2">Pinjaman Pemerintah</option>
                                                    <option value="2">Pinjaman Bank</option>
                                                </select>
                                                @error('du_asal_modal_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="du_jml_aset_usaha" class="col-sm-4 col-form-label text-end">Jumlah Aset Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_aset_usaha') is-invalid @enderror" wire:model="du_jml_aset_usaha" id="du_jml_aset_usaha" required="" placeholder="Masukkan Jumlah Aset Usaha" />
                                                @error('du_jml_aset_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_omset_bulan" class="col-sm-4 col-form-label text-end">Omzet Perbulan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_omset_bulan') is-invalid @enderror" wire:model="du_jml_omset_bulan" id="du_jml_omset_bulan" required="" placeholder="Masukkan Omzet Perbulan" />
                                                @error('du_jml_omset_bulan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_laba_bersih" class="col-sm-4 col-form-label text-end">Laba/Keuntungan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_laba_bersih') is-invalid @enderror" wire:model="du_laba_bersih" id="du_laba_bersih" required="" placeholder="Masukkan Laba/Keuntungan" />
                                                @error('du_laba_bersih') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_jml_tenaga_kerja" class="col-sm-4 col-form-label text-end">Jumlah Tenaga kerja <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('du_jml_tenaga_kerja') is-invalid @enderror" wire:model="du_jml_tenaga_kerja" id="du_jml_tenaga_kerja" required="" placeholder="Masukkan Jumlah Tenaga kerja" />
                                                @error('du_jml_tenaga_kerja') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_riwayat_usaha" class="col-sm-4 col-form-label text-end">Riwayat Singkat Perusahaan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_riwayat_usaha') is-invalid @enderror" wire:model="du_riwayat_usaha" id="du_riwayat_usaha" required="" placeholder="Masukkan Riwayat Singkat Perusahaan" />
                                                @error('du_riwayat_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_rencana_usaha" class="col-sm-4 col-form-label text-end">Rencana Pengembangan Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_rencana_usaha') is-invalid @enderror" wire:model="du_rencana_usaha" id="du_rencana_usaha" required="" placeholder="Masukkan Rencana Pengembangan Usaha" />
                                                @error('du_rencana_usaha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_alasan_peminjaman" class="col-sm-4 col-form-label text-end">Alasan Pinjaman Modal kerja <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_alasan_peminjaman') is-invalid @enderror" wire:model="du_alasan_peminjaman" id="du_alasan_peminjaman" required="" placeholder="Masukkan Alasan Pinjaman Modal Kerja" />
                                                @error('du_alasan_peminjaman') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kebutuhan_modal" class="col-sm-4 col-form-label text-end">Kebutuhan Pinjaman Modal <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_kebutuhan_modal') is-invalid @enderror" wire:model="du_kebutuhan_modal" id="du_kebutuhan_modal" required="" placeholder="Masukkan Kebutuhan Pinjaman Modal" />
                                                @error('du_kebutuhan_modal') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_penggunaan_modal" class="col-sm-4 col-form-label text-end">Penggunaan Modal Usaha <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_penggunaan_modal') is-invalid @enderror" wire:model="du_penggunaan_modal" id="du_penggunaan_modal" required="" placeholder="Masukkan Penggunaan Modal Usaha" />
                                                @error('du_penggunaan_modal') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="du_kesanggupan_angsuran" class="col-sm-4 col-form-label text-end">Kesanggupan Mengansur <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('du_kesanggupan_angsuran') is-invalid @enderror" wire:model="du_kesanggupan_angsuran" id="du_kesanggupan_angsuran" required="" placeholder="Masukkan Kesanggupan Mengansur" />
                                                @error('du_kesanggupan_angsuran') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-ahliWaris" role="tabpanel" aria-labelledby="nav-ahliWaris-tab">
                                <div class="row mb-4 mt-4">
                                    <div class="col-lg-2 col-sm-2"></div>
                                    <div class="col-lg-10 col-sm-6">
                                        <div class="mb-3 row">
                                            <label for="aw_nama" class="col-sm-3 col-form-label text-end text-end">Nama Lengkap <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_nama') is-invalid @enderror" wire:model="aw_nama" id="aw_nama" required="" placeholder="Masukkan Nama Lengkap" autocomplete="off" />
                                                @error('aw_nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_ttl" class="col-sm-3 col-form-label text-end">Tempat Tanggal Lahir <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_ttl') is-invalid @enderror" wire:model="aw_ttl" id="aw_ttl" required="" placeholder="Masukkan Tempat Tanggal Lahir" />
                                                @error('aw_ttl') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_alamat" class="col-sm-3 col-form-label text-end">Alamat <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_alamat') is-invalid @enderror" wire:model="aw_alamat" id="aw_alamat" required="" placeholder="Masukkan Alamat" />
                                                @error('aw_alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_hubungan" class="col-sm-3 col-form-label text-end">Hubungan <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('aw_hubungan') is-invalid @enderror" wire:model="aw_hubungan" id="aw_hubungan" required="" placeholder="Masukkan Hubungan" />
                                                @error('aw_hubungan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_no_tlp" class="col-sm-3 col-form-label text-end">No Telepon <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('aw_no_tlp') is-invalid @enderror" wire:model="aw_no_tlp" id="aw_no_tlp" required="" placeholder="Masukkan Nomor Telepon" />
                                                @error('aw_no_tlp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="aw_no_ktp" class="col-sm-3 col-form-label text-end">No KTP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control @error('aw_no_ktp') is-invalid @enderror" wire:model="aw_no_ktp" id="aw_no_ktp" required="" placeholder="Masukkan Nomor KTP" />
                                                @error('aw_no_ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-center">
                        <a href="{{ url('/pengajuan/daftar') }}" class="btn btn-gray-200" title="back to Pengiriman Hasil Panen"><i class="fa-solid fa-xmark"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-submit" style="margin-left: 10px;" id="btnSubmit">
                            <i class="fa fa-fw fa-save"></i> Simpan
                        </button>
                    </div>
                </form> -->
            </div>
        </div>
    </div>

</div>
