@extends('admin.index')

@section('pinjam')
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
                            <th>
                                Judul Buku
                            </th>
                            <th>
                                Anggota
                            </th>
                            <th>
                                tgl_pinjam
                            </th>
                            <th>
                                tgl_kembali
                            </th>
                            <th>
                                Opsi
                            </th>
                        </thead>
                        <tbody>
                            @forelse ($pinjams as $pinjam)
                                <tr>
                                    <td>
                                        {{ $pinjam->buku_id }}
                                    </td>
                                    <td>
                                        {{ $pinjam->user_id }}
                                    </td>
                                    <td>
                                        {{ $pinjam->tgl_pinjam }}
                                    </td>
                                    <td>
                                        {{ $pinjam->tgl_kembali }}
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
   
    <nav class=" fixed-bottom bg-transparent">
        <div class="d-flex justify-content-end mx-3 my-3">
            <a rel="tooltip" title="Tambah Data Buku" class="btn btn-primary" href="{{ url('pinjam/create') }}">
                <i class="fas fa-plus" style="font-size: 20px"></i>
            </a>
        </div>
    </nav>
@endsection
