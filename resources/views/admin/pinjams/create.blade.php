@extends('admin.index')

@section('pinjam')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary ">
                            <h4 class="card-title " data-color="purple">Pinjam Buku</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class=" g-0 bg-light position-relative  bg-transparent">
                                <form enctype="multipart/form-data" class="navbar-form" method="post"
                                    action="{{ route('pinjam.store') }}">
                                    @csrf


                                    <label class="bmd-label-floating " form="anggota">Anggota :</label>
                                    @error('judul_buku')
                                        <small class="text-danger">-tidak boleh kosong</small>
                                    @enderror


                                    <div class="form-group">
                                        <select class="choices form-select" name="user">
                                            <option value=""></option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <label class="bmd-label-floating mt-3" form="buku">Buku :</label>
                                    @error('judul_buku')
                                        <small class="text-danger">-tidak boleh kosong</small>
                                    @enderror

                                    <select class="choices form-select multiple-remove " multiple="multiple" name="buku[]">
                                        <optgroup label="Kategori">
                                            @foreach ($bukus as $buku)
                                                <option value="{{ $buku->id }}">
                                                    {{ $buku->judul_buku }}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>


                                    <label class="bmd-label-floating mt-3" form="hari">Hari :
                                    </label>
                                    <div class="input-group no-border ">
                                        <input type="number" name="hari" id="hari" class="form-control"
                                            value="" placeholder="">
                                        @error('halaman_buku')
                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                        @enderror
                                    </div>


                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                            <a rel="tooltip" title="Tabel" href="{{ url('pinjam') }}"
                                class="btn  btn-link btn-sm mt-3">
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
