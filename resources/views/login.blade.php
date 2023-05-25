@extends('layouts.layout')
@section('content')
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
                            <input type="text" id="email" class="form-control"
                                placeholder="hpk_teacher123@vsplphpk.onmicrosoft.com" />
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
                            <button type="submit" class="btn btn-secondary bg-primary">
                                <h5>Увійти</h5>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection
