@include('layouts.app')

<section class="mb-2" style="min-height: 75vh">
    <div class="container">
        <div class="row gap-3">
            {{-- mengambil data dari controller --}}
            @foreach ($beranda as $item)
                <div class="card" style="width: 17rem;">
                    <img src="{{ asset('/') }}storage/{{ $item->foto }}" class="card-img-top mt-3 rounded">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text">Harga: {{ $item->harga }}</p>
                        <p class="card-text">{{ $item->keterangan }}</p>
                    </div>
                </div>
            @endforeach
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
