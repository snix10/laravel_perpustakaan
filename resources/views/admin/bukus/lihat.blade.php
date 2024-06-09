@extends('admin.index')

@section('lihat')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  ">
                            <h4 class="card-title " data-color="purple">Buku</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row g-0  position-relative mt-3 bg-transparent">

                                <div class="col-md-6 mb-md-0 p-md-4 text-center">

                                    <img src="{{ asset('/') }}GambarBuku/{{ $lihat_buku->gambar_buku }}" class="w-50"
                                        alt="...">
                                </div>


                                <div class="col-md-6 p-4 ps-md-0">
                                    <div class="mx-2">
                                        <h2><b> {{ $lihat_buku->judul_buku }}</b></h2>
                                        <hr>
                                        kategori: <b>
                                            @foreach ($lihat_buku->kategoris()->get() as $kategori)
                                                <button class="btn btn-sm btn-primary">{{ $kategori->nama }}</button>
                                            @endforeach
                                        </b><br>
                                        jumlah buku: <b>{{ $lihat_buku->jumlah_buku }}</b><br>
                                        pengarang: <b>{{ $lihat_buku->pengarang_buku }}</b><br>
                                        penerbit: <b>{{ $lihat_buku->penerbit_buku }}</b><br>
                                        halaman: <b>{{ $lihat_buku->halaman_buku }}</b><br>
                                        deskripsi: <b>{{ $lihat_buku->deskripsi_buku }}</b><br>
                                        <hr>


                                        

                                            <a href="{{ route('buku.edit', $lihat_buku) }}"
                                                class="btn btn-warning  btn-sm">Edit
                                                {{-- <i class="fa fa-pen" style="font-size: 18px"></i> --}}
                                            </a>

                                            <a href="{{ route('buku.destroy', $lihat_buku) }}"
                                                class="btn  btn-sm btn-danger " data-confirm-delete="true">Hapus</a>

                                    
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
