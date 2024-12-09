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
                <a class="navbar-brand" href="{{ route(name: 'welcome') }}"><img src="frontend/images/mood-cloud-logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miriUiKitNavbar"
                    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                    <div class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="http://bootstrapdash.com/demo/miri-ui-kit-free/documentation/documentation.html" target="_blank">Docs</span></a>
                        </li> -->
            
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.html">UI Kits</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(name: 'welcome') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(name: 'login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Example Pages
                            </a>
                            <div class="dropdown-menu dropdown-menu-right ">
                                <a href="landing.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shape-outline"></i>Landing Page</a>
                                <a href="login.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-lock-outline"></i>Login Page</a>
                                <a href="profile.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>Profile Page</a>
                            </div>
                        </li> -->
            
                        <!-- <form action="https://www.bootstrapdash.com/product/miri-ui-pro/" target="_blank"class="form-inline ml-lg-3">
                            <button class="btn btn-danger">Register</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </nav>    
    </header>
    <div class="card login-card">
        <div class="card-body">
            <h3 class="text-center text-white font-weight-light mb-4">Login to your account</h3>
            <!-- <form action="/">
                <div class="form-group">
                    <input type="text" placeholder="First name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-danger btn-block mb-3">
            </form> -->

                        <form method="POST" action="/login" id="login-form">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <!-- Email Address -->
                            <div class="form-group">
                                <!-- <input id="email" class="form-control" type="email" name="email" required autofocus autocomplete="username" placeholder="Your Email">
                                <label for="email">Your Email</label>
                                <div class="text-danger" id="email-error"></div> -->

                                <input type="email" id="email" class="form-control" type="email" name="email" placeholder="Email">
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <!-- <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                <label for="password">Password</label>
                                <div class="text-danger" id="password-error"></div> -->

                                <input type="password" id="password" class="form-control" type="password" name="password" placeholder="Password">
                            </div>

                            <!-- Remember Me -->
                            <!-- <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                            </div> -->

                            <!-- Submit Button -->

                            <input type="submit" value="Login" class="btn btn-danger btn-block mb-3">

                        </form>

                        <div class="d-flex justify-content-between mt-4">
                            <p class="text-white text-center font-weight-light">Don't have an account? <a href="{{ route('register') }}" class="text-white"> Register here</a></p>
                        </div> 

            </div>


        </div>
    </div>
    <script src="../src/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../src/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../src/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
