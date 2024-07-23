@extends('layouts.log-main')

@section('content')
<div class="container">
    <div class="card shadow border-0 mt-3">
        <div class="card-body">
            <h1>Data Lokasi</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h2>Pasar</h2>
                    <table id="pasar-table" class="table table-striped mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Pasar</th>
                                <th>Alamat Pasar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h2>Kecamatan</h2>
                    <table id="kecamatan-table" class="table table-striped mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" name="id">
                    <input type="hidden" id="editType" name="type">
                
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama" required>
                        <div id="namaError" class="invalid-feedback">
                            <!-- Pesan error untuk nama -->
                        </div>
                    </div>
                
                    <div class="mb-3 d-none" id="alamatContainer">
                        <label for="editAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="editAlamat" name="alamat">
                        <div id="alamatError" class="invalid-feedback">
                            <!-- Pesan error untuk alamat -->
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                <input type="hidden" id="deleteId">
                <input type="hidden" id="deleteType">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function() {
        // Ambil token CSRF dari meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // DataTables initialization
        $('#pasar-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('lokasi.pasar.data') }}',
            columns: [
                { data: 'id_pasar', name: 'id_pasar' },
                { data: 'nama_pasar', name: 'nama_pasar' },
                { data: 'alamat_pasar', name: 'alamat_pasar' },
                {
                    data: 'id_pasar',
                    name: 'aksi',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-primary btn-sm" onclick="editPasar(${data}, '${row.nama_pasar}', '${row.alamat_pasar}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(${data}, 'pasar')">Hapus</button>
                        `;
                    }
                }
            ]
        });

        $('#kecamatan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('lokasi.kecamatan.data') }}',
            columns: [
                { data: 'id_kecamatan', name: 'id_kecamatan' },
                { data: 'nama_kecamatan', name: 'nama_kecamatan' },
                {
                    data: 'id_kecamatan',
                    name: 'aksi',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-primary btn-sm" onclick="editKecamatan(${data}, '${row.nama_kecamatan}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(${data}, 'kecamatan')">Hapus</button>
                        `;
                    }
                }
            ]
        });
    });

    function editPasar(id, nama, alamat) {
        $('#editId').val(id);
        $('#editType').val('pasar');
        $('#editNama').val(nama);
        $('#editAlamat').val(alamat); // Pastikan alamat diisi dengan benar
        $('#alamatContainer').removeClass('d-none'); // Tampilkan field alamat jika diperlukan
        $('#editModal').modal('show');
    }

    function editKecamatan(id, nama) {
        $('#editId').val(id);
        $('#editType').val('kecamatan');
        $('#editNama').val(nama);
        $('#alamatContainer').addClass('d-none'); // Sembunyikan field alamat untuk kecamatan
        $('#editModal').modal('show');
    }


    $('#editForm').submit(function(event) {
        event.preventDefault();
        let id = $('#editId').val();
        let type = $('#editType').val();
        let nama = $('#editNama').val();
        let alamat = $('#editAlamat').val();
        let data = {
            id: id,
            type: type,
            nama: nama,
            alamat: alamat
        };

        $.ajax({
            url: '/api/update-lokasi',
            method: 'PUT',
            data: data,
            success: function(response) {
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                // Reset previous error messages
                $('#namaError').text('');
                $('#alamatError').text('');

                // Display error messages
                let errors = xhr.responseJSON.errors || {};
                if (errors.nama) {
                    $('#editNama').addClass('is-invalid');
                    $('#namaError').text(errors.nama[0]);
                } else {
                    $('#editNama').removeClass('is-invalid');
                }

                if (errors.alamat) {
                    $('#editAlamat').addClass('is-invalid');
                    $('#alamatError').text(errors.alamat[0]);
                } else {
                    $('#editAlamat').removeClass('is-invalid');
                }
            }
        });
    });



    function confirmDelete(id, type) {
        $('#deleteId').val(id);
        $('#deleteType').val(type);
        $('#deleteModal').modal('show');
        $('#confirmDeleteButton').off().on('click', function() {
            $.ajax({
                url: `/api/delete-lokasi/${id}`,
                method: 'DELETE',
                data: { type: type },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    alert('Terjadi kesalahan: ' + error.responseText);
                }
            });
        });
    }
</script>

@endsection
