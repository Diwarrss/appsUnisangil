@extends('adminCoreui.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Register</h1>
                <p class="text-muted">Create your account</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="icon-user"></i>
                    </span>
                    </div>
                    <input id="name" placeholder="Username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                    </div>
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="icon-lock"></i>
                    </span>
                    </div>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="icon-lock"></i>
                    </span>
                    </div>
                    <input id="password-confirm" type="password" placeholder="Repeat password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button class="btn btn-block btn-success" type="submit">Create Account</button>
            </form>
        </div>
        <div class="card-footer p-4">
          <div class="row">
            <div class="col-6">
              <button class="btn btn-block btn-facebook" type="button">
                <span>facebook</span>
              </button>
            </div>
            <div class="col-6">
              <button class="btn btn-block btn-twitter" type="button">
                <span>twitter</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
