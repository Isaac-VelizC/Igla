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
                    <h1 class="text-primary mb-10">Get Started</h1>
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
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign Up Form</h6>
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">Username</label>
                            <input id="name" type="text" placeholder="Username" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                            <label for="email">Correo Electronico</label>
                            <input id="email" type="email" placeholder="Correo Electronico" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="row">
                        <div class="col-6">
                            <div class="input-style-1">
                                <label>Contraseña</label>
                                <input id="password" placeholder="Contraseña" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-6">
                            <div class="input-style-1">
                                <label>Confirmar</label>
                                <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="form-check checkbox-style mb-30">
                          <input class="form-check-input" type="checkbox" value="" id="checkbox-not-robot" />
                          <label class="form-check-label" for="checkbox-not-robot">
                            No soy Robot</label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                            Sign Up
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  <div class="singup-option pt-20">
                    <p class="text-sm text-medium text-center text-gray">
                        Regístrese fácilmente con
                    </p>
                    <div class="button-group pt-20 pb-20 d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn-outline m-1">
                        <i class="lni lni-facebook-fill mr-5"></i>
                        Facebook
                      </button>
                      <button class="main-btn danger-btn-outline m-1">
                        <i class="lni lni-google mr-5"></i>
                        Google
                      </button>
                    </div>
                    <p class="text-sm text-medium text-dark text-center">
                        ¿Ya tienes una cuenta? <a href="signin.html">Sign In</a>
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
