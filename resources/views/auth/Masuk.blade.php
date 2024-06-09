@extends('auth.index')

@section('Masuk')
    <div class="content ">
        <div class="container-fluid ">

            @if (session()->has('masukGagal'))
                <div class="row justify-content-center mx-1 mt-3">
                    <div class="col-lg-4  rounded-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('masukGagal') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row d-flex justify-content-center  ">
                <div class="col-md-4 ">
                    <div class="card my-5">
                        
                        <div class="card-body text-center">
                           
                                <i class="fas fa-lock " style="font-size: 70px"></i>
                            
                            <form action="{{ url('/masuk') }}" method="POST">
                                @csrf
                                <div class=" g-0 bg-light position-relative mt-3 bg-transparent">



                                    {{-- <label class="mb-0 mt-4" for="email">Email</label> --}}
                                    @error('email')
                                        <small class="text-danger">-{{ $message }}</small>
                                    @enderror
                                    <div class="input-group no-border  mb-3">
                                        <input type="email" name="email" class="form-control rounded-pill" id="email"
                                            placeholder="Email" required value="{{ old('email') }}">

                                        @error('email')
                                            <i class="material-icons" style="color: red">error</i>
                                        @enderror
                                    </div>

                                    {{-- <label class="mb-0 mt-4" for="password">Password</label> --}}
                                    @error('password')
                                        <small class="text-danger">-{{ $message }}</small>
                                    @enderror
                                    <div class="input-group no-border ">
                                        <input type="password" name="password" class="form-control rounded-pill rounded-end border-start" id="password"
                                            placeholder="Password" required>
                                        <a class="btn rounded-pill rounded-start border border-start" onclick="lihatPassword()">
                                            <i class="far fa-eye" style="font-size: 18px"></i>
                                        </a>
                                        @error('password')
                                            <i class="material-icons" style="color: red">error</i>
                                        @enderror
                                    </div>


                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary col-12 rounded-pill">
                                        Masuk

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        jika belum terdaftar, daftar <a href="{{ url('daftar') }}">disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
