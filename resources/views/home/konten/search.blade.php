@extends('home.perpustakaan')

@section('search')
    @if (count($kategoris) === 0)
    @else
        <h5 class="mt-3">Kategori</h5>
        <hr>
        <div class=" row">
            @forelse  ($kategoris as $kategori)
                <div class="col">

                    <a href="{{ route('kategoribuku.show', $kategori) }}" class="btn m-1 border ">{{ $kategori->nama }}</a>

                </div>
            @empty
            @endforelse
        </div>
    @endif




    @if (count($bukus) === 0)
    @else
        <h5 class="mt-3">Buku</h5>
        <hr>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5  g-4 mt-3">
            @forelse  ($bukus as $buku)
                <div class="col">
                    <a class="card h-100 border-0 text-decoration-none bg-transparent" type="button"
                        href="{{ route('perpustakaan.show', $buku) }}">
                        <img src="{{ asset('/') }}GambarBuku/{{ $buku->gambar_buku }}" class="img rounded" alt="..."
                            style="">
                        <div class="my-2">
                            <p class="card-title ">{{ $buku->judul_buku }}</p>

                        </div>

                    </a>
                </div>
            @empty
                <div style="font-size: 20px">Tidak ada buku</div>
            @endforelse
        </div>
    @endif



@endsection
