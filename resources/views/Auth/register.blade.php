<!DOCTYPE html>
<html lang="en">
<head>
  @include('assets.links')
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <form id="register" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="error-message"></div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Phone Number" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="error-message"></div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="error-message"></div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="error-message"></div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="error-message"></div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="success-message"></div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
@include('assets.scripts')

<script>
    $("#register").on('submit',function(e)
    {
        e.preventDefault();
        var data = $("#register").serialize();
        // console.log(data +"  data")
        $.ajax({
            type:'post',
            dataType:'json',
            url:'{{route('registerPost')}}',
            data:data,
            success:function(data)
            {
              $('.success-message').empty();
              $(".error-message").empty();
              if(data.success == 0)
              {
               
                $.each(data.response, function(field,message)
                {
                  var inputField = $("input[name="+field+"]")
                  var errorDiv = inputField.closest('.input-group').next('.error-message')
                  errorDiv.append('<p class="error-message text-danger">' + message + '</p>');
                })
              }
              else if(data.success == 2)
              {
                
                $('.success-message').append('<p class="error-message text-danger">' + data.response + '</p>')
              }
              else{
                $('.success-message').append('<p class="error-message text-success">' + data.response + '</p>')
                setTimeout(() => {
                  window.location.href = '{{ route('login') }}'
                }, 2000);
              }
            }
        })
    })
</script>
</body>
</html>
