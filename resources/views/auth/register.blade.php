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
                <a class="navbar-brand" href="index.html"><img src="frontend/images/mood-cloud-logo.png" alt=""></a>
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
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
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
            <h3 class="text-center text-white font-weight-light mb-4">Register</h3>
*
                        <form method="POST" action="{{ route('register') }}" id="register-form">
                            @csrf

                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" type="email" name="email" placeholder="Email">
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input type="password" id="password" class="form-control" type="password" name="password" placeholder="Password">
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="text-danger" id="password_confirmation-error"></div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <!-- Already Registered Link -->
                                <p class="text-white text-center font-weight-light"><a href="{{ route('login') }}"  class="text-white">Already registered?</a></p>
                            </div> 

                            <!-- Submit Button -->
                            <input type="submit" value="Login" class="btn btn-danger btn-block mb-3">

                        </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <nav class="navbar navbar-dark bg-transparent navbar-expand d-block d-sm-flex text-center justify-content-between">
                <div class="d-flex">
                    <span class="navbar-text py-0">Copyright © </span><a href="https://www.bootstrapdash.com/" target="_blank" class="text-white pl-1"> Bootstrapdash.com</a><span class="navbar-text py-0 pl-1">2020</span>
                </div>
                <div class="d-flex justify-content-start">
                    <span class="text-small text-white mx-0 footer-link">Free  </span>
                     <a href="https://www.bootstrapdash.com/ui-kit/" target="_blank" class="text-small text-white mx-1 footer-link">UI kits  </a> 
                     <span href="#" class="text-small text-white mx-0 footer-link">from</span> <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white pl-1"> Bootstrapdash.com</a>
                </div>
            </nav>
        </div>
    </footer>
    <script src="../src/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../src/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../src/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
