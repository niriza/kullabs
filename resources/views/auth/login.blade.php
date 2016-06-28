<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Kullabs | {{ isset($title) ? $title : '' }}</title>
    <!-- @yield('title')  -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="{{URL::to('images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::to('images/favicon.ico')}}" type="image/x-icon">

    @include('_partials.assets')

</head>
<body  class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Kullabs</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {{ Form::open(array('route' => 'login.post')) }}
          <div class="form-group has-feedback">
            <input type="username" placeholder="Username" class="form-control">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" placeholder="Password" class="form-control">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button class="btn btn-primary btn-block btn-flat" type="submit">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        {{ Form::close() }}
        <a href="#">I forgot my password</a><br>
        <a class="text-center" href="register">Register a new membership</a>

      </div>
      <!-- /.login-box-body -->
    </div>
</body>