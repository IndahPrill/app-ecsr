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
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table id="mmb-table" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No TLP</th>
                <th>No KTP</th>
                <th>Jenis Kelamin</th>
                <th>Hak Akses</th>
                <th>Status</th>
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
                url: "{{ route('get.data.users') }}",
                dataSrc: function (json) {
                    var return_data = new Array();
                    var i = 1;
                    $.each(json.data, function (index, value) {
                        let levelUser = "";
                        let genreUser = "";
                        let validUser = "";

                        if (value.user_level == '0') {
                            levelUser = '<span class="badge bg-info">User</span>';
                        } else if (value.user_level == '1') {
                            levelUser = '<span class="badge bg-danger">Admin</span>';
                        } else {
                            levelUser = '<span class="badge bg-success">Staff</span>';
                        }

                        if (value.genre == '1') {
                            genreUser = '<span class="badge bg-warning">Laki-Laki</span>';
                        } else {
                            genreUser = '<span class="badge bg-danger">Perempuan</span>';
                        }
                        if (value.user_valid == '1') {
                            validUser = '<span class="badge bg-info">Aktif</span>';
                        } else {
                            validUser = '<span class="badge bg-danger">Tidak Aktif</span>';
                        }

                        return_data.push({
                            'DT_RowIndex': value.DT_RowIndex,
                            'code_mb': value.code_mb,
                            'nama': value.first_name +' '+ value.last_name,
                            'email': value.email,
                            'alamat': value.address,
                            'no_tlp': value.no_tlp,
                            'no_ktp': value.no_ktp,
                            'genre': genreUser,
                            'user_level': levelUser,
                            'user_valid': validUser,
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
                { data: 'code_mb', name: 'code_mb' },
                { data: 'nama', name: 'nama' },
                { data: 'email', name: 'email' },
                { data: 'alamat', name: 'alamat' },
                { data: 'no_tlp', name: 'no_tlp' },
                { data: 'no_ktp', name: 'no_ktp' },
                { data: 'genre', name: 'genre' },
                { data: 'user_level', name: 'user_level' },
                { data: 'user_valid', name: 'user_valid' },
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

    function accessProcess(id, valid) {
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: {id : id, valid: valid},
                    url: "{{ route('access.process') }}",
                    dataType: "json",
                    // async: false,
                    success: function(json) {
                        console.log(json);
                        if (json.status) {
                            Swal.fire({
                                position: 'top-end',
                                title: 'Berhasil '+ json.message +' User!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                title: json.message,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                        $('#mmb-table').DataTable().ajax.reload();
                    }
                })
            }
        })
    }
</script>
