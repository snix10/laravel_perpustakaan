@extends('admin.index')

@section('kategori_buku')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Kategori
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>

                            <th>Kategori</th>

                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoribukus as $key => $kategori)
                            <tr>

                                <td>{{ $kategori->nama }}</td>


                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('kategori.show', $kategori) }}"
                                            class="btn btn-sm btn-primary me-1 rounded">Lihat

                                        </a>

                                        <a href="{{ route('kategori.edit', $kategori) }}"
                                            class="btn btn-warning  btn-sm me-1 rounded">Edit

                                        </a>

                                        <a href="{{ route('kategori.destroy', $kategori) }}"
                                            class="btn  btn-sm btn-danger rounded " data-confirm-delete="true">Hapus</a>
                                    </div>

                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <nav class=" fixed-bottom bg-transparent">
        <div class="d-flex justify-content-end mx-3 my-3">
            <a rel="tooltip" title="Tambah kategori" class="btn btn-primary" href="{{ url('kategori/create') }}">
                <i class="fas fa-plus" style="font-size: 20px"></i>
            </a>
        </div>
    </nav>
@endsection
