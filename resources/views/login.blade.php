<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @yield('header')
  <!-- Header -->
  <nav class="navbar bg-success-subtle navbar-expand-md navbar-light sticky-top">
    <div class="container-xxl">
        <!-- Icon -->
        <div>
            <a class="navbar-brand" href = "index.php"><img height="100%" src="images/hpk_logo.png" alt="Логотип ХПК" width="60" height="60" ></a>
        </div>
        <!-- Dropdown button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Link -->
        <div class="collapse navbar-collapse justify-content-center align-center h3" id="main-nav">
            <ul class="navbar-nav">
              <li class="nav-item mx-4">
                <a class="nav-link" href="index.php">Головна</a>
              </li>
              <li class="nav-item mx-4">
                <a class="nav-link" href="#">Файли</a>
              </li>
              <!-- Information (Може тупо видалити) -->
              <!-- <li class="nav-item mx-4">
                <a class="nav-link" href="infopage.php">Інформація</a>
              </li> -->
              <li class="nav-item mx-4">
                <a class="nav-link" href="login.php">Увійти</a>
              </li>
            </ul>
          </div>
    </div>
</nav>
    
<!-- Main -->
<main class="m-5">
  <!-- Log in page box -->
  <div class="container-lg">
  <div class="text-center">
    <h2>Вхід</h2>
  </div>
  <div class="row justify-content-center my-3">
    <div class="col-md-5">
      <form>
        <label for="email" class="form-label">Логін:</label>
        <div class="input-group mb-4">
          <span class="input-group-text">
            <i class="bi bi-envelope-fill text-secondary"></i>
          </span>
          <input type="text" id="email" class="form-control" placeholder="hpk_teacher123@vsplphpk.onmicrosoft.com" />
        </div>
        <label for="name" class="form-label">Пароль:</label>
        <div class="mb-4 input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill text-secondary"></i>
          </span>
          <!-- Пароль -->
          <input type="password" id="name" class="form-control" placeholder="••••••••••••••••" />
        </div>
        <div class="m-5 text-center">
          <button type="submit" class="btn btn-secondary bg-primary"><h5>Увійти</h5></button>
        </div>
      </form>
    </div>
  </div>
</div>
</main>

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
            </ul>
          </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


  
</body>
</html>

    