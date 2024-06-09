@extends('admin.index')

@section('user')
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
                            {{-- <th>Number</th> --}}

                            <th>nama</th>

                            <th>telephone</th>

                            <th>email</th>

                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                {{-- <td>
                                                    {{ $users->firstItem() + $key }}
                                                </td> --}}
                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->user_telepon }}
                                </td>

                                {{-- <td>
                                    @foreach ($user->roles()->get() as $role)
                                        <button class="btn btn-sm btn-primary me-2">{{ $role->name }}</button>
                                    @endforeach
                                </td> --}}
                                <td>
                                    {{ $user->email }}
                                </td>

                                

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('user.show', $user) }}" class="btn btn-sm btn-primary me-1">Lihat
                                            
                                        </a>

                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-warning  btn-sm me-1">Edit
                                           
                                        </a>

                                        <a href="{{ route('user.destroy', $user) }}" class="btn  btn-sm btn-danger "
                                            data-confirm-delete="true">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="content">

        <div class="container-fluid">
            <a rel="tooltip" title="Tambah User" href="{{ url('user/create') }}" class="btn btn-primary">Tambah</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title " data-color="purple">Tabel User</h4>
                            <p class="card-category"> tabel daftar user</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            NO
                                        </th>
                                        <th>
                                            nama
                                        </th>
                                        <th>
                                            password
                                        </th>
                                        <th>
                                            email
                                        </th>

                                        <th>
                                            Opsi
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>
                                                    {{ $users->firstItem() + $key }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    @foreach ($user->roles()->get() as $role)
                                                        <button
                                                            class="btn btn-sm btn-primary me-2">{{ $role->name }}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>

                                                <td class="td-actions text-right">
                                                    <div class="row ">
                                                        <a rel="tooltip" title="Edit"
                                                            href="{{ route('user.edit', $user) }}"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="fa fa-pen" style="font-size: 18px"></i>
                                                        </a>
                                                        <a rel="tooltip" title="Lihat"
                                                            href="{{ route('user.show', $user) }}"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="far fa-eye" style="font-size: 18px"></i>
                                                        </a>

                                                        <form action="{{ route('user.destroy', $user) }}" method="POST">
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
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <nav class=" fixed-bottom bg-transparent">
        <div class="d-flex justify-content-end mx-3 my-3">
            <a rel="tooltip" title="Tambah User" class="btn btn-primary" href="{{ url('tablelist/create') }}">
                <i class="fas fa-plus" style="font-size: 20px"></i>
            </a>
        </div>
    </nav>
@endsection
