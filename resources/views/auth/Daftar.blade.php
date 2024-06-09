@extends('auth.index')

@section('Daftar')
    <div class="content ">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center  ">

                <div class="col-md-4 ">
                    <div class="card my-5">
                        
                        <div class="card-body text-center">
                            <i class="fas fa-lock " style="font-size: 70px"></i>
                            <div class=" g-0 bg-light position-relative mt-3 bg-transparent">
                                <form action="{{ url('/daftar') }}" method="post">
                                    @csrf
                                    {{-- <label class="mb-0" for="nama">Nama</label> --}}
                                    @error('name')
                                        <small class="text-danger">-{{ $message }}</small>
                                    @enderror
                                    <div class="input-group no-border mb-3">

                                        <input type="text" name="name" id="nama" class="form-control rounded-pill"
                                            placeholder="nama" required>

                                    </div>


                                    {{-- <label class="mb-0 mt-4" for="email">Email</label> --}}
                                    @error('email')
                                        <small class="text-danger">-{{ $message }}</small>
                                    @enderror
                                    <div class="input-group no-border mb-3">
                                        <input type="email" name="email" class="form-control rounded-pill" id="email"
                                        placeholder="Email" required value="{{ old('email') }}">

                                    </div>

                                    {{-- <label class="mb-0 mt-4" for="password">Password</label> --}}
                                    @error('password')
                                        <small class="text-danger">-{{ $message }}</small>
                                    @enderror
                                    <div class="input-group no-border mb-3">
                                        <input type="password" name="password" class="form-control rounded-pill rounded-end" id="password"
                                            placeholder="password" required>
                                        <a class="rounded-pill rounded-start btn border" onclick="lihatPassword()">
                                            <i class="far fa-eye" style="font-size: 18px"></i>
                                        </a>
                                        
                                    </div>


                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary col-12 rounded-pill">
                                    Daftar

                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        jika sudah mendaftar, masuk <a href="{{ url('masuk') }}">disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
