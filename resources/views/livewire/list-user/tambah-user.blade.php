<div>
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
                    <li class="breadcrumb-item active">List user</li>
                </ol>
            </nav>
            <h2 class="h4">{{ $title }}</h2>
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
                    <div class="row mb-4 mt-4">
                        <div class="col-lg-2 col-sm-2"></div>
                        <div class="col-lg-10 col-sm-6">
                            <div class="mb-3 row">
                                <label for="first_name" class="col-sm-3 col-form-label text-end text-end">Nama Pertama <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" wire:model="first_name" id="first_name" required="" placeholder="Masukkan Nama Pertama" autocomplete="off" />
                                    @error('first_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_name" class="col-sm-3 col-form-label text-end text-end">Nama Terakhir<i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" wire:model="last_name" id="last_name" required="" placeholder="Masukkan Nama Terakhir" autocomplete="off" />
                                    @error('last_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label text-end text-end">Email <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email" id="email" required="" placeholder="Masukkan Email" autocomplete="off" />
                                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label text-end text-end">Password <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" wire:model="password" id="password" required="" placeholder="Masukkan Password" autocomplete="off" />
                                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label text-end text-end">Alamat <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model="address" id="address" required="" placeholder="Masukkan Alamat" autocomplete="off" />
                                    @error('address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_tlp" class="col-sm-3 col-form-label text-end text-end">No Telpon <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" wire:model="no_tlp" id="no_tlp" required="" placeholder="Masukkan Nomor Telpon" autocomplete="off" />
                                    @error('no_tlp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_ktp" class="col-sm-3 col-form-label text-end text-end">No KTP <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="no_ktp" id="no_ktp" required="" placeholder="Masukkan No KTP" autocomplete="off" />
                                    @error('no_ktp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="genre" class="col-sm-3 col-form-label text-end">Jenis Kelamin <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('genre') is-invalid @enderror" wire:model="genre" id="genre" aria-label="Default select example">
                                        <option value="0" selected>--PILIH--</option>
                                        <option value="1">Perempuan</option>
                                        <option value="2">Laki Laki</option>
                                    </select>
                                    @error('genre') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="user_level" class="col-sm-3 col-form-label text-end">User Level <i class="fa-solid fa-star fa-2xs" style="color: #ff0000;"></i></label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('user_level') is-invalid @enderror" wire:model="user_level" id="user_level" aria-label="Default select example">
                                        <option value="0" selected>--PILIH--</option>
                                        <option value="1">Staff</option>
                                        <option value="2">mitra binaan</option>
                                    </select>
                                    @error('user_level') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success pull-right" type="button" wire:click="store">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>