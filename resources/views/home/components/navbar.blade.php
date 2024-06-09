<nav id="header" class="navbar navbar-light bg-light mt-0 fixed-top">
    <div class="container-fluid">
        <div>
            <a class="btn btn-large" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample"><i class="fas fa-bars"></i></a>
        </div>
        <form class="d-flex ms-auto " action="{{ route('search') }}" method="GET">
            @csrf
            <input class="form-control me-2 rounded-pill " type="search" placeholder="" aria-label="Search"
                name="search">
            <button class="btn btn-outline-success rounded-circle" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</nav>




{{-- sidebar --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header ">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ms-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary btn-lg" style="border-radius:15px" type="submit"><i
                            class="fas fa-home fa-xl"></i></a>
                </div>
                <div class="col">
                    <a class="btn btn-danger btn-lg" style="border-radius:15px" type="submit"><i
                            class="fas fa-power-off  fa-xl"></i></a>
                </div>
                <div class="col">
                    <a class="btn  btn-lg text-white" style="border-radius:15px; background-color:darkorchid;"
                        type="submit"><i class="far fa-envelope fa-xl"></i></a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <a class="btn text-white btn-lg" style="border-radius:15px; background-color:deepskyblue;"
                        type="submit"><i class="fas fa-info-circle fa-xl"></i></a>
                </div>
                <div class="col">
                    <a class="btn btn-secondary btn-lg" style="border-radius:15px" type="submit"><i
                            class="fas fa-moon fa-xl"></i></a>
                </div>
                <div class="col">
                    @auth
                    <form action="{{ url('keluar') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-lg" style="border-radius:15px" type="submit"><i
                                class="fas fa-power-off  fa-xl"></i> </button>
                    </form>
                    @endauth

                    @guest
                    
                        <button class="btn btn-secondary btn-lg" style="border-radius:15px" type="submit"><i
                                class="fas fa-power-off  fa-xl"></i> </button>
                    
                    @endguest
                    
                </div>
            </div>
        </div>

    </div>
</div>
