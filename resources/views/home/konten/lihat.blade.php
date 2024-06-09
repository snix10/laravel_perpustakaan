@extends('home.perpustakaan')

@section('lihat')
    {{-- LIHAT BUKU /DETAIL BUKU --}}
    <div class="d-flex mt-3">
        <img src="{{ asset('/') }}GambarBuku/{{ $lihat_buku->gambar_buku }}" class="me-3 mt-3 rounded " alt="...">
        <div>
            <div class="mt-0 mt-3 " style="font-size: 25px">{{ $lihat_buku->judul_buku }}</div>
            <h5>{{ $lihat_buku->pengarang_buku }}</h5>
            <div class="btn-group">
                @auth
                    <button class="btn btn-sm btn-success m-1 rounded" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever=""><i class="fas fa-book-reader"></i> pinjam</button>
                    <button class="btn btn-sm btn-primary m-1 rounded"><i class="fas fa-shopping-bag"></i></button>
                @endauth
                @guest
                    <a href="/masuk" class="btn btn-sm btn-success m-1 rounded"><i class="fas fa-book-reader"></i> pinjam</a>
                    <a href="/masuk" class="btn btn-sm btn-primary m-1 rounded"><i class="fas fa-shopping-bag"></i></a>
                @endguest
            </div>
        </div>
    </div>

    <div class="row text-center mt-3 rounded mx-1" style="background-color:whitesmoke ">
        <div class="col my-2">jumlah buku <br> <b>{{ $lihat_buku->jumlah_buku }}</b></div>
        <div class="col my-2">pengarang <br> <b>{{ $lihat_buku->pengarang_buku }}</b></div>
        <div class="col my-2">halaman <br> <b>{{ $lihat_buku->halaman_buku }}</b></div>
        <div class="col my-2">penerbit <br> <b>{{ $lihat_buku->penerbit_buku }}</b></div>
    </div><br>
    <div class="mt-3">
        <div>Kategori :</div>
        @foreach ($lihat_buku->kategoris()->get() as $kategori)
            <a href="{{ route('kategoribuku.show', $kategori) }}"
                class="btn btn-sm btn-success me-2 mt-1">{{ $kategori->nama }}</a>
        @endforeach
    </div><br>
    <div clas="mt-5">Deskripsi : <br>
        <b>{{ $lihat_buku->deskripsi_buku }}</b>
    </div>
    <hr class="text-white">


    {{-- MODAL PINJAM --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="navbar-form" method="post"
                        action="{{ route('pinjams.store') }}">
                        @csrf
                        <div class="mb-3">
                            <input name="id" type="hidden" class="form-control" type="text"
                                value="{{ $lihat_buku->id }}" aria-label="readonly input example" readonly>
                            <input name="slug" type="hidden" class="form-control" type="text"
                                value="{{ $lihat_buku->slug }}" aria-label="readonly input example" readonly>
                            <input name="gambar_buku" type="hidden" class="form-control" type="text"
                                value="{{ $lihat_buku->gambar_buku }}" aria-label="readonly input example" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Buku:</label>
                            <input name="judul_buku" class="form-control" type="text"
                                value="{{ $lihat_buku->judul_buku }}" aria-label="readonly input example" readonly
                                placeholder="disable input">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Jumlah:</label>
                            <select name="jumlah" class="form-select" aria-label="Default select example">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Hari:</label>
                            <select name="hari" class="form-select" aria-label="Default select example">

                                <option value="1" selected>1 hari</option>
                                <option value="2">2 hari</option>
                                <option value="3">3 hari</option>
                                <option value="4">4 hari</option>
                                <option value="5">5 hari</option>
                                <option value="6">6 hari</option>
                                <option value="7">7 hari</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Pinjam</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
