<!DOCTYPE html>
<html lang="en">
<head>
    @include('assets.links')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      {{-- {{DD($errors)}} --}}
    @if(session('errorsMessage'))
      <div class="alert alert-danger">
          {{ session('errorsMessage') }}
      </div>
    @endif
   
      <form action="{{route('loginPost')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if(session('errors'))
            <p class="text-danger">
                {{ session('errors')->first('email') }}
            </p>
        @endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      @if(session('errors'))
          <p class="text-danger">
              {{ session('errors')->first('password') }}
          </p>
      @endif
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label" for="remember">
            Remember Me
        </label>
    </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@include('assets.scripts')
<!-- /.login-box -->
</body>
</html>
