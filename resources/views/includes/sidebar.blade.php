<div class="col-3 p-0">
    <div class="bg-secondary h-100 me-5">
        <div class="text-center p-3 border-bottom">
            <h5 class="text-light fw-bold">{{ ucwords(Auth::user()->roles) }} Page</h5>
        </div>
        <ul class="list-group mt-3">
            <a class="text-decoration-none" href="{{ route('dashboard') }}"><li class="list-group-item border border-0 {{ request()->is('dashboard') ? 'active' : '' }} px-5">Dashboard</li></a>
            
            @if (Auth::user()->roles != "admin")
            <a class="text-decoration-none" href="{{ route('presensi') }}"><li class="list-group-item border border-0 {{ request()->is('presensi*') ? 'active' : '' }} px-5">Presensi</li></a>
            @else
            <a class="text-decoration-none" href="{{ route('berita-acara') }}"><li class="list-group-item border border-0 {{ request()->is('berita-acara*') ? 'active' : '' }} px-5">Berita Acara</li></a>
            <a class="text-decoration-none" href="{{ route('asisten') }}"><li class="list-group-item border border-0 {{ request()->is('asisten*') ? 'active' : '' }} px-5">Data Asisten</li></a>
            @endif
            <a class="text-decoration-none" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><li class="list-group-item border border-0 px-5">Logout</li></a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </ul>
    </div>
</div>