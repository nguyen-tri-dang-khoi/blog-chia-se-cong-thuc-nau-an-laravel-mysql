@extends('layouts.app')
@section('title','Login')
@section('header')
  @parent
@endsection
@section('content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-12">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <form action="{{ route('login.admin') }}" method="post" class="tm-login-for">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  name="email"
                  type="text"
                  class="form-control validate"
                  id="email"
                  value=""
                  required
                />
              </div>
              <div class="form-group mt-3 @error('password') is-invalid @enderror">
                <label for="password">Password</label>
                <input
                  name="password"
                  type="password"
                  class="form-control validate"
                  id="password"
                  value=""
                  required
                />
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
              </div>
              <div class="form-group mt-4">
                <button
                  type="submit"
                  class="btn btn-primary btn-block text-uppercase"
                >
                  Login
                </button>
              </div>
              
              <button class="mt-5 btn btn-primary btn-block text-uppercase">
                Forgot your password?
              </button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
  @parent
@endsection
@section('script','')