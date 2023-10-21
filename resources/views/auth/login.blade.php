@extends('layouts.auth')

@section('content')
<!-- ========== signin-section start ========== -->
<section class="signin-section">
    <div class="container-fluid">
      <div class="row g-0 auth-row">
        <div class="col-lg-6">
          <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
              <div class="title text-center">
                <h1 class="text-primary mb-10">Welcome Back</h1>
                <p class="text-medium">
                  Sign in to your Existing account to continue
                </p>
              </div>
              <div class="cover-image">
                <img src="assets/images/auth/signin-image.svg" alt="" />
              </div>
              <div class="shape-image">
                <img src="assets/images/auth/shape.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
          <div class="signin-wrapper">
            <div class="form-wrapper">
              <h6 class="mb-15">Sign In Form</h6>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                        <label for="email">Correo Electronico o Username</label>
                        <input id="email" type="email" placeholder="Email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label for="password">Contraseña</label>
                      <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class="form-check checkbox-style mb-30">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="checkbox-remember">Recuerdame la proxima vez</label>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                      @if (Route::has('password.request'))
                            <a class="hover-underline" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button type="submit"  class="main-btn primary-btn btn-hover w-100 text-center">
                        Inicia sesión
                      </button>
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </form>
              <div class="singin-option pt-25">
                <p class="text-sm text-medium text-center text-gray">
                    Fácil inicio de sesión con
                </p>
                <div class="button-group pt-25 pb-25 d-flex justify-content-center flex-wrap">
                  <button class="main-btn primary-btn-outline m-2">
                    <i class="lni lni-facebook-fill mr-10"></i>
                    Facebook
                  </button>
                  <button class="main-btn danger-btn-outline m-2">
                    <i class="lni lni-google mr-10"></i>
                    Google
                  </button>
                </div>
                <p class="text-sm text-medium text-dark text-center">
                    ¿Todavía no tienes ninguna cuenta?
                  <a href="{{ route('register') }}">Crea una cuenta</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
  </section>
<!-- ========== signin-section end ========== -->
@endsection
