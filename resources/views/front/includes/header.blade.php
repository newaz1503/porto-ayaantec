<header class="header">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-lg-2 col-12 align-self-center">
                <div class="logo">
                    <a href="">
                        {{-- <h3>PORTO</h3> --}}
                        <img src="{{ setting()->logo }}"/>
                    </a>
                    {{-- <a href="index-drak.html">
                        <img class="light-logo" src="{{ asset('front_asset') }}/img/logo.png" alt="logo" />
                        <img class="drak-logo" src="{{ asset('front_asset') }}/img/white-logo.png" alt="logo" />
                    </a> --}}
                </div>
                <div class="mobile-menu-tg">
                    <div class="mobile-lg-toggle">
                        <div class="toggle-btn-lg">
                            <span class="drak"></span>
                        </div>
                    </div>
                    <div class="mobile-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
            <!-- Header Right -->
            <div class="col-lg-10 col-12">
                <!-- Right Button -->
                <div class="dl-cv desk_dark_light_button">
                    <div class="toggle-btn-lg">
                        <span class="drak"></span>
                    </div>
                </div>
                <div class="dl-cv">
                    <a class="button-1" download href="{{  asset(setting()->cv) }}">Download CV</a>
                </div>
               
                
                <!-- Menu -->
                <div class="menu">
                    <nav>
                        <ul>
                            <li class="nav-item current">
                                <a class="nav-link" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About Me</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>