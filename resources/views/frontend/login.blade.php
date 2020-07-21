<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Project Management User Login </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php 
       //if writer status is disable or enable
       
        $GetWriterID = Session::get('writer_id');
        $WriterProfile = DB::table('tbl_writer')
                          ->where('writer_id', $GetWriterID)
                          ->first(); 
        if($WriterProfile && $WriterProfile->writer_status == 1){
            echo '<p class="text-center alert alert-warning">Your account is Inactive.</p>';
            echo '<p class="text-center"><a href="'.route('writer.dashboard.logout').'">Try Again</a></p>';
        }elseif($WriterProfile && $WriterProfile->writer_status == 0) {
              header('Location: '.route('writer.dashboard.index'));
              die();
        }
        
        else {
            echo '<p class="login-box-msg">Sign in to start your session</p>';
        }
       
      ?>
      
      <?php
        $exception = Session::get('exception');
        
        if($exception){
          echo '<p class="text-center alert alert-danger">'.$exception.'</p>';
          Session::put('exception', null);
        }
      ?>

      <form method="POST" action="{{ route('writer.login.action') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="writer_email" value=""  autocomplete="email" autofocus placeholder="Email">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
         <div class="input-group mb-3">

          <input type="password" class="form-control" name="writer_password"  autocomplete="current-password" placeholder="Password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

        </div> 

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}assets/dist/js/adminlte.min.js"></script>

</body>
</html>
