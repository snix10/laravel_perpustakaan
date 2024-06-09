@extends('home.perpustakaan')

@section('kategoris')
    @include('home.components.banner')


    <div class="row row-cols-2 row-cols-md-3 g-4 mt-3">
        @forelse  ($kategoris as $kategoribuku)
            <div class="col">
                <div class="card">

                    <a  href="{{ url('kategoribuku')}}/{{ $kategoribuku->nama }}" class="card-body text-decoration-none">
                        {{ $kategoribuku->nama }}
                    </a>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
