<x-layouts.base>
    @if(in_array(request()->route()->getName(), [
        'dashboard',
        'profile',
        'profile-example',
        'users',
        'bootstrap-tables',
        'transactions',
        'buttons',
        'forms',
        'modals',
        'notifications',
        'pengajuan-daftar',
        'pengajuan-tambah',
        'mitra-binaan-daftar',
        'mitra-binaan-pembayaran',
        'mitra-binaan-tambah',
        'info-kegiatan-daftar',
        'info-kegiatan-tambah',
        'laporan-info-kegiatan',
        'laporan-mitra-binaan',
        'laporan-pengajuan'
    ]))

    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')
    </main>
    @include('layouts.script')

    @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login', 'login-example', 'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))

    {{ $slot }}

    {{-- Footer --}}
    @include('layouts.footer2')

    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif
</x-layouts.base>
