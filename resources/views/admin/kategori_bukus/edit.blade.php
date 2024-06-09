@extends('admin.index')

@section('kategori_edit')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card from-group">
                        <div class="card-header">
                            <h4 class="card-title " data-color="purple">Kategori</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class=" g-0 bg-light position-relative  bg-transparent">
                                <form enctype="multipart/form-data" class="navbar-form" method="post"
                                    action="{{ route('kategori.update', $edit_kategori) }}">
                                    @csrf
                                    @method('PUT')

                                    <label class="bmd-label-floating mt-3" form="nama_kategori">Kategori : </label>
                                    <div class="input-group no-border ">
                                        <input type="text" name="nama" id="Kategori" class="form-control"
                                            value="{{$edit_kategori->nama}}" placeholder="">
                                        @error('nama')
                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                        @enderror
                                    </div>

                                    
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Edit</button>
                            <a rel="tooltip" title="Tabel" href="{{ url('kategori') }}"
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
