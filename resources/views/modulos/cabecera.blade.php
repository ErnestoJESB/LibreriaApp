  <link rel="stylesheet" href="http://localhost/LibreriaAppM/resources/css/styles.css">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Account Dropdown Menu-->
      <li class="dropdown user user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown">
          @if (auth()->user()->foto == "")
            <img src="http://localhost/LibreriaAppM/public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          @else
          <img src="{{ url('storage/'.auth()->user()->foto) }}" class="user-image" alt="User Image">
          @endif
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header ">
              @if (auth()->user()->foto == "")
                <img src="http://localhost/LibreriaAppM/public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              @else
              <img src="{{ url('storage/'.auth()->user()->foto) }}" class="img-circle" alt="User Image">
              @endif  
              <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-body">
              <a href="{{ route('MiPerfil') }}" class="dropdown-item">Perfil</a>
              <div class="dropdown-divider"></div>

              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Salir</a>
              <form method="post" id="logout-form" action="{{ route('logout') }}"> 
                @csrf
              </form>
            </li>
        </ul>
      </li>
  </nav>
  <!-- /.navbar -->
