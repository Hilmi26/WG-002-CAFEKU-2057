@include('layouts.app')

<section class="mb-2" style="min-height: 75vh">
    <div class="container">
        <div class="card">
            <h3 class="mt-3 ms-3">Order</h3>
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label d-flex justify-content-between" for="menu">
                                    <div>Menu</div>
                                    <div><em class="justify-content-end">jika lebih dari satu pisahkan dengan koma (,)</em></div>
                                </label>
                                <input type="text" class="form-control" name="jml_pesanan"
                                    placeholder="Masukkan Menu" >
                            </div>
                            <div class="mb-3">
                                <label>Harga per menu</label>
                                <input type="number" class="form-control" name="ttl_pesanan"
                                    placeholder="Masukkan Total Pesanan" value="25000" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Pilih status</option>
                                    <option value="Member">Member</option>
                                    <option value="Non Member">Non Member</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div class="mt-3 w-50">
                            @isset($data)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Hasil Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <td>{{ $data['nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Jumlah Pesanan</th>
                                            <td>{{ $data['jml_pesanan'] }} Pcs</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Total Pesanan</th>
                                            <td>Rp. {{ $data['ttl_pesanan'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <td>{{ $data['status'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Diskon</th>
                                            <td>{{ $data['diskon'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Total Pembayaran</th>
                                            <td>Rp. {{ $data['ttl_pembayaran'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
