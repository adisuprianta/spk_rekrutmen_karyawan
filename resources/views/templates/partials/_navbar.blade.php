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
            <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/kriteria">Kriteria</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Karyawan
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Produksi</a>
                    <a class="dropdown-item" href="#">Non-Produksi</a>
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

            <li class="nav-item ">
            <a class="nav-link" href="/login">Login</a>
            </li>
            </li>
        </ul>
    </div>
  <!-- Links -->
  
</nav>