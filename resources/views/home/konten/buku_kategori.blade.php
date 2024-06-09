

@extends('home.perpustakaan')

@section('bukus')
<div class="display-6 mt-2">{{$kategoris->nama}}</div><hr>
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-5  g-4 mt-1">
   
    @forelse  ($kategoris->bukus()->get() as $buku)
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
        <div style="font-size: 20px" >Tidak ada buku</div>
    @endforelse
</div>



@endsection