@extends('layouts.user_type.guest')

@section('content')

  <section class="min-vh-50 mb-2">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('https://wallpapercave.com/wp/wp9424145.jpg');">
      <span class="mask bg-gradient-dark opacity-4"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h2 class="text-white mb-2 mt-5">Welcome to ICT-MS!</h2>
            <p class="text-lead text-white">Log with your account credentials to proceed.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
          <div class="card-body">
              <form role="form" method="POST" action="/session">
                @csrf
                <label>Email</label>
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <label>Password</label>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

