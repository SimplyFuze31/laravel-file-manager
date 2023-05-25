@extends('layouts')
@extends('header')

@section('content')

    @yield('header')
      <!-- Header -->
    
      
  <!-- Main -->
  <main class="m-5">
      <div> 
        <!-- Text -->
          <div class="mx-5">  
            <h1 class="h1">Хмельницький політехнічний фаховий коледж</h1>
            <h4>Національного університету "Львівська політехніка"</h4>
            <p class="m-2">Це інформаційно-файловий сервер коледжу. Ним можуть користуватися як і студенти так і викладачі. <br>
              Для студентів не потрібна реєстрація, достатньо просто перейти за посиланнями у верхній частині сторінки. <br>
              Викладачам у свою чергу потрібно увійти в систему для отримання доступу до всієї необхідної інформації. <br>
              Для входу в систему потрібно натиснути на кнопку Увійти у правій верхній частині екрану. <br>
              Після чого потрібно ввести свої логін та пароль у необхідних полях та натиснути Увійти. <br>
              Ваші логін та пароль, за необідності, ви можете дізнатися у адміністратора сервера. <br>
              За замовчуванням це ваші вхідні дані до Microsoft Teams. <br>
              В самому низу сайту ви можете знайти корисні посилання. <br>
            </p>
          </div>
          <!-- Image 2        Start   -->
          <div class="text-center">
            <img src={{asset('images/hpk_big2.jpg')}} alt="ХПК" class="img-fluid img-thumbnail m-3">
          </div>
          <!-- Image 3/4 -->
          <div class="text-center">
            <img src={{asset('images/hpk_big4.jpg')}} alt="ХПК" class="img-fluid img-thumbnail m-2">
            <img src={{asset('images/hpk_big3.jpg')}} class="img-fluid img-thumbnail m-2">
          </div>
          <!-- Image 1 -->
          <div class="text-center">
            <img src={{asset('images/hpk_big.jpg')}} alt="ХПК" class="img-fluid img-thumbnail m-3">
          </div>
          <!-- Image         End    -->
      </div>
  </main>

  <!-- Footer -->
  <nav class="navbar bg-body-secondary navbar-expand-sm navbar-light bottom">
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
              </ul>
            </div>
      </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  @endsection
    
