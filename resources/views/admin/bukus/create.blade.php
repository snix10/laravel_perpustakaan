@extends('admin.index')

@section('create')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary ">
                            <h4 class="card-title " data-color="purple"><a class="" href="{{ url('buku') }}">Buku </a>/
                                Tambah Buku</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class=" ">
                                <form enctype="multipart/form-data" class="navbar-form" method="post"
                                    action="{{ route('buku.store') }}">
                                    @csrf

                                    <div class="">
                                        <label class="" form="gambarBuku">Gambar Buku:</label>
                                        @error('gambar_buku')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="">
                                            <input type="file" name="gambar_buku" id="gambarBuku" class="form-control "
                                                value="" placeholder="" required>
                                            @error('gambar_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class=" mt-3" form="judul">Judul Buku:</label>
                                        @error('judul_buku')
                                            <small class="text-danger">-tidak boleh kosong</small>
                                        @enderror
                                        <div class="input-group no-border ">
                                            <input type="text" name="judul_buku" id="judul" class="form-control "
                                                value="{{ old('judul_buku') }}" placeholder="" required>
                                            @error('judul_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class="bmd-label-floating mt-3">Kategori Buku:</label><br>
                                        <select class="choices form-select multiple-remove " multiple="multiple"
                                            name="kategori[]">
                                            <optgroup label="Kategori">
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}">
                                                        {{ $kategori->nama }}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>


                                        <label class=" mt-3" form="jumlah_buku">Jumlah Buku:</label>
                                        <div class="input-group no-border ">
                                            <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control"
                                                value="" placeholder="" required>
                                            @error('jumlah_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class=" mt-3" form="pengarang_buku">Pengarang Buku: -
                                            (opsional)</label>
                                        <div class="input-group no-border">
                                            <input type="text" name="pengarang_buku" id="pengarang_buku"
                                                class="form-control" value="{{ old('pengarang_buku') }}" placeholder="">
                                            @error('pngarang_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class=" mt-3" form="penerbit_buku">Penerbit Buku: -
                                            (opsional)</label>
                                        <div class="input-group no-border ">
                                            <input type="text" name="penerbit_buku" id="penerbit_buku"
                                                class="form-control" value="{{ old('pengarang_buku') }}" placeholder="">
                                            @error('penerbit_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class=" mt-3" form="judul">Halaman Buku: -
                                            (opsional)</label>
                                        <div class="input-group no-border ">
                                            <input type="number" name="halaman_buku" id="post" class="form-control"
                                                value="{{ old('halaman_buku') }}" placeholder="">
                                            @error('halaman_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>

                                        <label class=" mt-3" form="deskripsi">Deskripsi: -
                                            (opsional)</label>
                                        <div class="input-group no-border ">
                                            <textarea class="form-control" name="deskripsi_buku" type="text" id="deskripsi" rows="5">{{ old('deskripsi_buku') }}</textarea>
                                            @error('deskripsi_buku')
                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                            <a rel="tooltip" title="Tabel" href="{{ url('buku') }}"
                                class="btn  btn-link btn-sm mt-3  ">
                                <i class="fas fa-list-alt" style="font-size: 25px"></i>
                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
