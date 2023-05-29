    <!-- Footer -->
    <nav class="navbar bg-body-secondary navbar-expand-sm navbar-light fixed-bottom">
        <div class="container-xxl">
            <!-- Link -->
            <div class="navbar-collapse justify-content-center h6" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="https://hpk.edu.ua/">Офіційний сайт</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="https://www.facebook.com/hpknulp">Facebook</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="https://www.instagram.com/khm.politehcollege/">Instagram</a>
                    </li>
                    @auth
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{route('logout')}}">Log out</a>
                    </li>
                        
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
