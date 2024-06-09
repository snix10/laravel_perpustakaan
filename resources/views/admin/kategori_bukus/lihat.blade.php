@extends('admin.index')

@section('lihat_kategori_buku')

<section class="section">
    

    <div class="content">
        <div class="container-fluid">
            <a rel="tooltip" title="Tabel" href="{{ url('kategori') }}" class="btn btn-sm">
                <i class="fas fa-list-alt" style="font-size: 25px"></i>
            </a><br>
            <h3>Kategori : <strong>{{ $kategoris->nama }}</strong></h3>
            <hr>
            <div class="row">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5  g-4 mt-1">
                    @forelse  ($kategoris->bukus()->get() as $buku)
                        <div class="col">
                            <div class="card h-80">
                                <img src="{{ asset('/') }}GambarBuku/{{ $buku->gambar_buku }}" class="card-img-top"
                                    alt="..." style="height: 210px; widht:156px">

                                <h5 class="card-title my-2 mx-2" style="font-size: 15px"><strong>{{ $buku->judul_buku }}</strong></h5>
                            </div>
                        </div>

                    @empty
                        <div class="text-center mx-5" style="font-size: 20px">Tidak ada buku</div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
@endsection
