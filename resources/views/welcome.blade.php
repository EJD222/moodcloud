
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

<body>
    <header class="miri-ui-kit-header landing-header header-bg-2">
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
                            <a class="nav-link" href="index.html">Home</a>
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
        <div
            class="miri-ui-kit-header-content text-center text-white d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-3 text-white">Welcome to Mood Cloud</h1>
            <p class="h5 font-weight-light text-white">Analyze emotions, get sentiment scores, and convert speech to text instantly – all in one tool.</p>
            <p class="mt-4">
                <!-- <button class="btn btn-danger btn-pill mr-2">Get Started</button>  -->
        </div>
    </header>

    <section class="miri-ui-kit-section mt-5">
        <div class="container">
            <div class="d-md-flex justify-content-between row">
            <h6 class="text-warning mb-3">How it works</h5>

                <div class="feature-box px-3">
                    <span class="card-icon bg-danger text-white rounded-circle">1</span>
                    <h3 class="mb-3">Type or Say Something</h3>
                    <p>Input your text or use our speech-to-text feature to start analyzing.</p>
                </div>


                <div class="feature-box px-3">
                    <span class="card-icon bg-success text-white rounded-circle">2</span>
                    <h3 class="mb-3">Analyze Sentiment</h3>
                    <p>The tool processes the input to detect emotions and calculate sentiment scores.</p>
                </div>


                <div class="feature-box px-3">
                    <span class="card-icon bg-primary text-white rounded-circle">3</span>
                    <h3 class="mb-3"> View Analysis Results</h3>
                    <p>Get clear insights, including emotion labels and sentiment scores, instantly.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- <section class="miri-ui-kit-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h6 class="text-warning mb-3">About</h5>
                        <h2 class="h1 font-weight-semibold mb-4">Meet our business partner who work behind the scene.
                        </h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed esse doloremque
                            nostrum, fuga fugit minima quod delectus magni explicabo quis aliquam laborum molestiae sint
                            voluptatum ea beatae sunt rerum! Saepe.</p>
                        <p><button class="btn btn-primary">Learn more</button></p>
                </div>
                <div class="col-md-6 text-right"><img src="assets/images/about.png" alt="About" class="img-fluid"></div>
            </div>
        </div>
    </section> -->
    <!-- <Section class="miri-ui-kit-section team-members-section">
        <div class="container">
            <h2 class="pb-2 mb-5">Team Members</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-1.jpg" alt="Team 1" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Afonso Pinto</h5>
                            <p class=" font-weight-medium designation">Founded & Chairman</p>
                            <p>Achieve virtually any design and layout from with in the</p>
                            <p class="social-links">
                                <a href="#" class="icon-fb"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="#" class="icon-twitter"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="#" class="icon-insta"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-2.jpg" alt="Team 2" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Irene Sotelo</h5>
                            <p class=" font-weight-medium designation">Frontend Developer</p>
                            <p>Achieve virtually any design and layout from with in the</p>
                            <p class="social-links">
                                <a href="#" class="icon-fb"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="#" class="icon-twitter"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="#" class="icon-insta"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-3.jpg" alt="Team 3" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Marama Petera</h5>
                            <p class=" font-weight-medium designation">Designer & Creative Director</p>
                            <p>Achieve virtually any design and layout from with in the</p>
                            <p class="social-links">
                                <a href="#" class="icon-fb"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="#" class="icon-twitter"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="#" class="icon-insta"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section> -->
    <!-- <section class="miri-ui-kit-section pricing-section">
        <div class="container">
            <h2>Choose Plan</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <div class="card-group">
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Free</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-primary">ChoosePlan</button>
                        </p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Premium</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-danger">ChoosePlan</button>
                        </p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Business</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-success">ChoosePlan</button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="miri-ui-kit-section contact-section">
        <div class="container">
            <h2 class="text-center mb-4">Work with us</h2>
            <p class="text-center mb-4 pb-3">If there is something we can help you with, just let us know. We'll <br />
                be more than happy to offer you our
                help.</p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="/" class="contact-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Default">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill"
                                    placeholder="Email@example.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Contact-number">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="Send Message" class="btn btn-block btn-pill btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
    <footer class="pt-5 mt-2">
        <div class="container">

            <nav class="navbar navbar-dark bg-transparent navbar-expand d-block d-sm-flex text-center justify-content-between">
                <div class="d-flex">
                    <span class="navbar-text text-dark py-0">Copyright © </span><a href="" target="_blank" class="text-dark pl-1">Mood Cloud</a><span class="navbar-text py-0 pl-1">2020</span>
                </div>
                <div class="d-flex justify-content-start">
                    <span class="text-small text-dark mx-0 footer-link">Free  </span>
                     <a href="https://www.bootstrapdash.com/ui-kit/" target="_blank" class="text-small text-dark mx-1 footer-link">UI kits  </a> 
                     <span href="#" class="text-small text-dark mx-0 footer-link">from</span> <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark pl-1"> Bootstrapdash.com</a>
                </div>
            </nav>
        </div>
    </footer>
    <div id="demoVideoLightbox" class="lightbox" onclick="hideVideo('video','youtube')">
        <div class="lightbox-container">  
          <div class="lightbox-content">
            
            <button data-close="lightbox" class="lightbox-close">
              Close | ✕
            </button>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/eTlZLNws6zc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>      
            
          </div>
        </div>
      </div>
    <script src="../src/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../src/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../src/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../src/js/miri-ui-kit.js"></script>
</body>

</html>