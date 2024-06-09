@extends('admin.index')

@section('buku')
    <div class="content">

        <div class="container-fluid">
            <div class="row col-md-12">
                <div class="col-md-3">
                    <a rel="tooltip" title="Tambah Data Buku" href="{{ url('buku/create') }}"
                        class="btn btn-primary">Tambah</a>
                </div>
                <div class="col">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group no-border">
                            <input type="text" class="form-controller" id="search" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="fa fa-search" style="font-size: 22px"></i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title " data-color="purple">Tabel Buku</h4>
                            <p class="card-category"> tabel daftar buku</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            NO
                                        </th>
                                        <th>
                                            Judul Buku
                                        </th>
                                        <th>
                                            Ketegori
                                        </th>
                                        <th>
                                            Jumlah Buku
                                        </th>
                                        <th>
                                            Dipinjam
                                        </th>
                                        <th>
                                            Opsi
                                        </th>
                                    </thead>
                                    <tbody>

                                        @forelse ($bukus as $key => $buku)
                                            <tr>
                                                <td>
                                                    {{ $bukus->firstItem() + $key }}
                                                </td>
                                                <td>
                                                    <strong>{{ $buku->judul_buku }}</strong>
                                                </td>
                                                <td>
                                                    @foreach ($buku->kategoris()->get() as $kategori)
                                                        <button
                                                            class="btn btn-sm btn-primary me-2">{{ $kategori->nama }}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $buku->jumlah_buku }}
                                                </td>
                                                <td>
                                                    {{ $buku->penulis_buku }}
                                                </td>

                                                <td class="td-actions text-right">
                                                    <div class="row ">
                                                        <a rel="tooltip" title="Edit"
                                                            href="{{ route('buku.edit', $buku) }}"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="fa fa-pen" style="font-size: 18px"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Lihat"
                                                            href="{{ route('buku.show', $buku) }}"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="far fa-eye" style="font-size: 18px"></i>
                                                        </a>

                                                        <form action="{{ route('buku.destroy', $buku) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" rel="tooltip" title="Hapus"
                                                                class="btn btn-danger btn-link btn-sm">
                                                                <i class="far fa-trash-alt" style="font-size: 18px"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>

                                </table>

                                <div class="pull-right">
                                    {{ $bukus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class=" fixed-bottom bg-transparent">
        <div class="d-flex justify-content-end mx-3 my-3">
            <a rel="tooltip" title="Tambah Data Buku" class="btn btn-primary" href="{{ url('buku/create') }}">
                <i class="fas fa-plus" style="font-size: 20px"></i>
            </a>
        </div>
    </nav>
@endsection
