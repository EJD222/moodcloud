<header class="miri-ui-kit-header landing-header header-bg-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-on-scroll">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="frontend/images/mood-cloud-logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miriUiKitNavbar"
                aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-menu">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                <div class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('analyze') }}">
                                Sentiment Analyzer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('history') }}">
                                Sentiment History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </div>
            </div>
            <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                <div class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <div
        class="miri-ui-kit-header-content text-center text-white d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white">
            Welcome to <b>Mood Cloud</b>
        </h1>
        <p class="h5 font-weight-light text-white">
            Analyze emotions, get sentiment scores, and convert speech to text instantly
            – all in one tool.
        </p>
        <p class="mt-4">
            <!-- <button class="btn btn-danger btn-pill mr-2">Get Started</button>  -->
    </div>
</header>