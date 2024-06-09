@extends('home.users.index')

@section('profile')
    {{-- <div class="d-flex position-relative">
        <img src="{{ asset('asset2/topeng.png') }}" class="flex-shrink-0 me-3 rounded-circle" alt="..."
            style="widht:100px; height:100px;">
        <div>
            <h5 class="mt-3 display-6">{{ auth()->user()->name }}</h5>
            {{ now()->getTimestamp() }}
        </div>
    </div> --}}

    <div class="d-flex position-relative p-3 rounded mt-3 border" style="background-color: white">
        <img src="{{ asset('asset2/topeng.png') }}" class="flex-shrink-0 me-3 rounded-circle" alt="..."
            style="widht:80px; height:80px;">
        <div class="col-8">
            <div class="display-6">
                {{ auth()->user()->name }}
            </div>
            <hr>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-md-4 g-4 mt-1">
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <div>Buku</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <div>Menunggu</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <div>Meminjam</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <div>History</div>
                </div>
            </div>
        </div>
        
    </div>

    @foreach ($pinjams as $pinjam)
        @foreach ($pinjam->buku()->get() as $buku)
            <div class="d-flex position-relative mt-3">
                <img src="{{ asset('/') }}GambarBuku/{{ $buku->gambar_buku }}" class="flex-shrink-0 me-3" alt="..."
                    style="width: 100px">
                <div>
                    <h5 class="mt-0">{{ $buku->judul_buku }}</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                            aria-valuenow="{{ now()->getTimestamp() }}" aria-valuemin="{{ $pinjam->tgl_konfirmasi }}"
                            aria-valuemax="{{ $pinjam->tgl_kembali }}" style=""></div>
                    </div>
                    <a href="#" class="stretched-link">{{ $pinjam->tgl_kembali }}</a>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
