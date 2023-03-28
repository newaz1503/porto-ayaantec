<footer class="footer" style="background-image: url('{{ asset('front_asset') }}/img/footer.png');">
    <!-- Footer Top -->
    <div class="footer-top pt-70 pb-30">
        <div class="container">
            <div class="row">
                <!-- Single -->
                <div class="col-lg-4 mb-30 align-self-center">
                    <div class="footer-widgets">
                        <div class="footer-social">
                            @foreach (socials() as $social)     
                      <span><a href="{{ $social->link }}" target="_blank"><i class="{{ $social->icon }}"></i></a></span>
                      @endforeach
                            
                            {{-- <span><a href="#"><i class="fab fa-twitter"></i></a></span>
                            <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                            <span><a href="#"><i class="fab fa-linkedin"></i></a></span> --}}
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-4 mb-30">
                    <div class="footer-widgets">
                        <div class="f-logo">
                            <a href="{{ route('front.index') }}">
                                <img class="light-logo" src="{{ asset(setting()->logo) }}" alt="logo" />
                                <img class="drak-logo" src="{{ asset(setting()->logo) }}" alt="logo" />
                            </a>
                        </div>
                        <p>{{ Str::limit(setting()->about_description,150,'') }} <a href='#about'>Read More</a></p>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-4 mb-30 align-self-center">
                    <div class="footer-widgets">
                        <div class="curent_link">
                            <a href="#">Home</a>
                            <a href="#services">Service</a>
                            <a href="#portfolio">Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="f-copy-text">
                        <p>{{ setting()->copyright }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>