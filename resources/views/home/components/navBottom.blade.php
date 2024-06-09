<ul  class="nav justify-content-center bg-transparent  fixed-bottom ">
    <div class="d-flex rounded-pill  mb-1  container-fluid mx-2 " style="background-color:rgb(35, 136, 97)">
        <a class="nav-link mx-auto {{ Request::is('perpustakaan') ? '' : 'text-black' }}" style="font-size: 25px; {{ Request::is('perpustakaan') ? 'color:brown;' : '' }} " href="/perpustakaan"><i class="fas fa-book"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Buku"></i></a>
        <a class="nav-link  mx-auto {{ Request::is('kategoribuku') ? '' : 'text-black' }}" style="font-size: 25px; {{ Request::is('kategoribuku') ? 'color:brown;' : '' }}" href="/kategoribuku"><i class="fab fa-buffer"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Kategori"></i></a>
        <a class="nav-link text-black mx-auto" style="font-size: 25px"><i class="fas fa-shopping-bag"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Ransel"></i></a>
                @auth
                <a class="nav-link  mx-auto {{ Request::is('profile') ? '' : 'text-black' }}" style="font-size: 25px; {{ Request::is('profile') ? 'color:brown;' : '' }}" href="/profile"><i class="fas fa-user"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="User"></i></a>
                @endauth
                @guest
                <a class="nav-link  mx-auto {{ Request::is('profile') ? '' : 'text-black' }}" style="font-size: 25px; {{ Request::is('profile') ? 'color:brown;' : '' }}" href="/masuk"><i class="fas fa-user"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="User"></i></a>
                @endguest
        
    </div>
</ul>
