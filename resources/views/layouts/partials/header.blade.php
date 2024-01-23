<nav class="navbar bg-success-subtle navbar-expand-md navbar-light sticky-top">
  <div class="container-xxl">
      <!-- Icon -->
      <div>
          <a class="navbar-brand" href="/"><img height="100%" src={{ asset('images/hpk_logo.png') }}
                  alt="Логотип ХПК" width="60" height="60" loading="lazy"></a>
      </div>
      <!-- Dropdown button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
          aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Link -->
      <div class="collapse navbar-collapse justify-content-center align-center h3 text-secondary" id="main-nav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item me-4">
                  <a class="nav-link" href="/">Головна</a>
              </li>
              @auth
                  <li class="nav-item mx-4">
                      <a class="nav-link" href="/folders">Файли</a>
                  </li>
              @endauth

              @guest
                  <li class="nav-item ">
                      <a class="nav-link" href="/login">Увійти</a>
                  </li>
              @endguest

          </ul>
          

          <div class="dropdown ms-auto align-center text-secondary">
            @auth
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item align-middle" href="{{route('logout')}}"><i class='bx bx-exit me-1 align-middle'></i>Вийти</a></li>
            </ul>
            @endauth
          </div>

    
          
      </div>

  </div>
</nav>