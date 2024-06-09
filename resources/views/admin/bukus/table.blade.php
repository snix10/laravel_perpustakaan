@extends('admin.index')

@section('buku')
    @include('sweetalert::alert')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Buku
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>

                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Dipinjam</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $key => $buku)
                                <tr>

                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>
                                        @foreach ($buku->kategoris()->get() as $kategori)
                                            <button class="btn btn-sm btn-primary me-2 mt-1">{{ $kategori->nama }}</button>
                                        @endforeach
                                    </td>
                                    <td>{{ $buku->jumlah_buku }}</td>
                                    <td>{{ $buku->jumlah_buku }}</td>
                                    <td>

                                        <div class="btn-group">
                                            <a href="{{ route('buku.show', $buku) }}"
                                                class="btn btn-sm btn-primary me-1 rounded">Lihat

                                            </a>

                                            <a href="{{ route('buku.edit', $buku) }}"
                                                class="btn btn-warning  btn-sm me-1 rounded">Edit

                                            </a>

                                            <a href="{{ route('buku.destroy', $buku) }}"
                                                class="btn  btn-sm btn-danger rounded " data-confirm-delete="true">Hapus</a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>


    <nav class=" fixed-bottom bg-transparent">
        <div class="d-flex justify-content-end mx-3 my-3">
            <a rel="tooltip" title="Tambah Buku" class="btn btn-primary" href="{{ url('buku/create') }}">
                <i class="fas fa-plus" style="font-size: 20px"></i>
            </a>
        </div>
    </nav>
@endsection
