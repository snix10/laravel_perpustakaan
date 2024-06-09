@extends('home.perpustakaan')

@section('bukus')
    
@include('home.components.banner')

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5  g-4 mt-3">
        @forelse  ($bukus as $perpustakaan)
            <div class="col">
                <a class="card h-100 border-0 text-decoration-none bg-transparent" type="button"
                    href="{{ route('perpustakaan.show', $perpustakaan) }}">
                    
                    <img src="{{ asset('/') }}GambarBuku/{{ $perpustakaan->gambar_buku }}" class="img rounded" alt="..."
                        style="">
                    <div class="my-2">
                        <p class="card-title ">{{ $perpustakaan->judul_buku }}</p>

                    </div>

                </a>
            </div>
        @empty
            <div style="font-size: 20px">Tidak ada buku</div>
        @endforelse
    </div>

    {{ $bukus->links() }}

   
@endsection
