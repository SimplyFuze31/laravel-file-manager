{{-- <header class="bg-success-subtle">
    <div class="d-flex justify-content-between">
        <div class="w-25 ms-5">
            <a class="navbar-brand" href="/"><img  src={{ asset('images/hpk_logo.png') }}
                    alt="Логотип ХПК" width="70" height="70"></a>
        </div>
        <nav class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse justify-content-center align-center h3" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item me-4">
                        <a class="nav-link" href="/">Головна</a>
                    </li>
                    @auth
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="/folders">Файли</a>
                        </li>
                    @endauth
    
                    @guest
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="/login">Увійти</a>
                        </li>
                    @endguest
    
                </ul>
            </div>
        </nav>
        @auth
        <div class="d-flex align-items-end fs-4 ">

            <p>{{ Auth::user()->name }}</p>

        </div>
    @endauth
    </div>

</header> --}}


 <nav class="navbar bg-success-subtle navbar-expand-md navbar-light sticky-top">
    <div class="container-xxl">
        <!-- Icon -->
        <div>
            <a class="navbar-brand" href="/"><img height="100%" src={{ asset('images/hpk_logo.png') }}
                    alt="Логотип ХПК" width="60" height="60"></a>
        </div>
        <!-- Dropdown button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
            aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Link -->
        <div class="collapse navbar-collapse justify-content-center align-center h3" id="main-nav">
            <ul class="navbar-nav">
                <li class="nav-item me-4">
                    <a class="nav-link" href="/">Головна</a>
                </li>
                @auth
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/folders">Файли</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="/login">Увійти</a>
                    </li>
                @endguest

            </ul>
        </div>
        {{-- @auth
        <div class="d-flex align-items-end fs-4 ">

            <p>{{ Auth::user()->name }}</p>

        </div>
    @endauth --}}
    </div>
</nav> 
