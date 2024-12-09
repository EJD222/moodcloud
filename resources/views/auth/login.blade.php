<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="public/favicon.ico">
    <title>Mood Cloud</title>

    <!-- Vendor css -->
    <link rel="stylesheet" href="{{ url('frontend/css/materialdesignicons.min.css') }}">

    <!-- Base css with customised bootstrap included -->
    <link rel="stylesheet" href="{{ url('frontend/css/miri-ui-kit-free.css') }}">

    <!-- Stylesheet for demo page specific css -->
    <link rel="stylesheet" href="{{ url('frontend/css/demo.css') }}">

</head>

<body class="login-page">
    <header class="miri-ui-kit-header header-no-bg-img header-navbar-only">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="{{ route(name: 'welcome') }}"><img
                        src="frontend/images/mood-cloud-logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miriUiKitNavbar"
                    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(name: 'welcome') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(name: 'login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="card login-card">
        <div class="card-body">
            <h3 class="text-center text-white font-weight-bold mb-4">Login to your account</h3>

            <form method="POST" action="/login" id="login-form">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Address -->
                <div class="form-group">
                    <input type="email" id="email" class="form-control" type="email" name="email" placeholder="Email">
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" id="password" class="form-control" type="password" name="password"
                        placeholder="Password">
                </div>

                <input type="submit" value="Login" class="btn btn-block mb-3"
                    style="background-color: #d21486; color: white; border: none;">

            </form>

            <div class="d-flex justify-content-between mt-4">
                <p class="text-white text-center font-weight-light">
                    Don't have an account?
                    <a href="{{ route('register') }}" style="color: #f2fe72;">Register here</a>
                </p>
            </div>
        </div>
    </div>
    <script src="public/vendors/jquery/dist/jquery.min.js"></script>
    <script src="public/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>