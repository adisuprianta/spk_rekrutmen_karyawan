<nav class="navbar navbar-expand-sm ">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
      <div class="image">
            <img src="{{asset('assets/image/Admin.png')}}" alt="">
      </div>
      <div class="text-logo">
          <h2>Hi, HRD</h2>
          <p>Selamat Datang</p>
      </div>
  </a>
  
    <div class=" collapse navbar-collapse justify-content-end menu-item">
        <ul class="nav navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/kriteria">Kriteria</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href=""  id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                        Karyawan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/home/produksi">Produksi</a>
                        <a class="dropdown-item" href="/home/nonproduksi">Non-Produksi</a>
                </div>
                </div>
                
                
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Rangking
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Produksi</a>
                <a class="dropdown-item" href="#">Non-Produksi</a>
            </div>

            @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </li>
        </ul>
    </div>
  <!-- Links -->
  
</nav>