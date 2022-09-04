<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="{{ asset('images/logo/logo.png') }}" alt="logo" width="300px">
    {{-- <a href="../../index2.html"><b>Admin</b>LTE</a> --}}
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <h6 class="mb-0 text-center">Register</h6>
        <hr>
        <form action="/registration" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" value="{{ old('name') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" id="is_active" name="is_active" value="aktif" hidden readonly>
                <input type="hidden" id="role" name="role" value="update role" readonly>
            </div>
            <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            </div>
        </form>
        <hr>
        <p class="mb-2 mt-2">
            Do You Have Account? <a href="/login" class="text-center"> Login Here</a>
        </p>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
