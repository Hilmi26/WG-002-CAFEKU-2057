@include('layouts.app')

<section class="mb-2" style="min-height: 75vh">
    <div class="container py-5">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formtambah">
            Tambah User
        </button>

        {{-- Model Form Tambah --}}
        <div class="modal fade" id="formtambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="formtambah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdate">User</h5>
                        <button type="button" class="rounded" style="width: 34px; border: 1px solid"
                            data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <form action="/user" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col mb-2">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control " required>
                            </div>
                            <div class="col mb-2">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label>Nama user</label>
                                <select name="role" id="" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Owner">Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- mengambil data dari controller --}}
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <button type="button" class="btn btn-md btn-dark" style="width: 80px"
                                data-bs-toggle="modal" data-bs-target="#formUpdate{{ $item->id }}">
                                Ubah
                            </button>
                            <form action="/user/{{ $item->id }}" method="post" style="display: inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-md btn-danger" style="width: 80px"
                                    onclick="return confirm ('Yakin akan menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Model Form Update --}}
                    <div class="modal fade" id="formUpdate{{ $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="formUpdate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formUpdate">Edit User</h5>
                                    <button type="button" class="rounded" style="width: 34px; border: 1px solid"
                                        data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <form action="/user/{{ $item->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="col mb-2">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $item->name }}">
                                            </div>
                                            <div class="col mb-2">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $item->email }}">
                                            </div>
                                            <div class="col mb-2">
                                                <label class="mb-2">Current Password</label>
                                                <input type="text" name="password" class="form-control mb-2"
                                                    value="{{ $item->password }}" readonly>
                                            </div>
                                            <div class="col mb-2">
                                                <label class="mb-2">New Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>
                                            <div class="col mb-2">
                                                <label>Role</label>
                                                <select name="role" id="" class="form-control">
                                                    <option value="{{ $item->role }}">
                                                        {{ $item->role }}</option>
                                                    <option value="">Pilih Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Owner">Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary me-2">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section>
    <div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top mt-auto">
            <div class="container">
                <p class="col-md-4 mb-0 text-muted">Jl Watugong Malang © Cafeku 2022</p>
            </div>
        </footer>
    </div>
</section>

</body>

</html>
