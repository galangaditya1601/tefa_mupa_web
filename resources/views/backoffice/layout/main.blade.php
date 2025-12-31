<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset('assets/backoffice/favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/backoffice/favicon.ico') }}" />
    <!-- Generated: 2018-04-06 16:27:42 +0200 -->
    <title>Login - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <!-- Dashboard Core -->
    <link href="{{ asset('assets/backoffice/css/dashboard.css') }}" rel="stylesheet" />
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('assets/backoffice/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <!-- Google Maps Plugin -->
    <link href="{{ asset('assets/backoffice/plugins/maps-google/plugin.css') }}" rel="stylesheet" />
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <!-- <img src="{{ asset('assets/backoffice/brand/tabler.svg') }}" class="h-6" alt=""> -->
              </div>
              <form class="card" action="" method="post">
                @csrf
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <div class="form-group">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="password">
                      Password
                      {{-- <a href="{{ route('password.request') }}" class="float-right small">I forgot password</a> --}}
                    </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="remember" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                {{-- Don't have an account yet? <a href="{{ route('register') }}">Sign up</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
