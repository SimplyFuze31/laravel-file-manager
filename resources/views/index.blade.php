@extends('layouts.layout')

@section('title','Main page')
    

@include('layouts.header')
@section('content')
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
  @endsection
    
  @include('layouts.footer')