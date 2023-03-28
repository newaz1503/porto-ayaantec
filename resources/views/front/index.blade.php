<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="{{ setting()->meta_author }}">
    <meta name="keywords" content="@foreach (json_decode(setting()->meta_keywords) as $item){{ $item }},@endforeach"/> 
    <meta name="description" content="{{ setting()->meta_description }}" /> 
    <meta property="og:image" content="{{ asset(setting()->meta_photo) }}" />
    <title>PORTO</title>
    <link rel="icon" href="{{ asset('front_asset') }}/img/icon.png" type="image/gif" sizes="16x16" />
 
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/fontawesome.all.min.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/lightcase.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/normalize.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('front_asset') }}/css/toastr.min.css">
</head>

<body class="">
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Start Header Area -->
    @include('front.includes.header')
    <!-- End Header Area -->
{!! setting()->calendly_code !!}
    <!-- Start Hero Area -->
    <section class="hero-area section-bg" id="home">
        <div class="container">
            <div class="row">
                <!-- Hero Content -->
                <div class="col-lg-6 order-lg-first order-last align-self-center">
                    <div class="hero-caption">
                        <h4 class="left-border-s">Hello</h4>
                        <h2>I'm <span>{{ setting()->banner_name }}</span> <br><span id="typed">{{  setting()->banner_title }}</span></h2>
                        <div class="type-wrap">
                            <span  style="white-space:pre;"></span>
                        </div>
                        @foreach ($titles as $title)
                        <span id="animated-text" data="{{ $title->title }}"></span>
                        @endforeach
                        <p>{{  setting()->banner_description }}</p>
                        <a class="button-1" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/mollameehedi'});return false;">{{ setting()->calendly_button_name }}</a>
                    </div>
                </div>
                <!-- Hero Image -->
                <div class="col-lg-6 align-self-end">
                    <div class="hero-image banner_slider_img owl-carousel">
                        @foreach ($sliders as $slider)
                        <img src="{{ asset($slider->photo) }}" alt="img" class="pt-5">
                        @endforeach
                       <!-- Image -->
                        <div class="hero-shap-img ">
                            <img class="rotateme" src="{{ asset('front_asset') }}/img/ellipse-shape.png"
                                alt="img" class="mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->
    <!-- Start About Area -->
    <section class="about-area pt-70" id="about">
        <div class="container">
            <div class="row">
                <!-- About Image -->
                <div class="col-lg-5 mb-40">
                    <div class="about__area_img">
                    <div class="about-img wow fadeInUp" data-wow-delay="0.3s">
                        <img src="{{ asset(setting()->about_image) }}" alt="img">
                    </div>
                </div>
                </div>
                <!-- About Content -->
                <div class="col-lg-7 align-self-center mb-40">
                    <div class="about-content wow fadeInUp">
                        <h4 class="left-border-s">About Me</h4>
                        <h2>{{ setting()->about_title }} <span>Success</span></h2>
                        <p>{{ setting()->about_description }}</p>
                        <a class="button-1" download="" href="{{  asset(setting()->cv) }}">Download CV</a>
                        <div class="row">
                            <!-- row -->
                            <div class="col-md-6 col-sm-12">
                                <!-- col-6 -->
                                <div class="about-cn">
                                    <ul>
                                        <li><i class="fas fa-user-tie"></i> {{ setting()->name }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i> {{ setting()->address }}</li>
                                    </ul>
                                </div>
                            </div> <!-- end col-6 -->
                            <div class="col-md-6 col-sm-12">
                                <!-- col-6 -->
                                <div class="about-cn">
                                    <ul>
                                        
                                        <li><i class="far fa-envelope"></i>{{ setting()->email }}</li>
                                        <li><i class="fab fa-whatsapp"></i> {{ setting()->number }}</li>
                                    </ul>
                                </div>
                            </div> <!-- end col-6 -->
                        </div>
                    </div>
                </div>
                <!-- About Your Skill -->
                <div class="col-lg-12 mb-40">
                    <div class="about-your-skill">
                        <div class="row">
                            @foreach ($skills as $skill)
                            <div class="col-md-6">
                                <!-- Single -->
                                <div class="progress-bars wow fadeInUp" data-wow-delay=".1s">
                                    <div class="single-progress">
                                        <h3>{{ $skill->name }}</h3>
                                        <div class="progress">
                                            <div class="progress-bar wow" style="width: {{ $skill->percentage }}%;">
                                                <span class="percent">{{ $skill->percentage }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Counter Area -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-headding mb-40 text-center">
                            <h2>My Achievement</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($achievements as $achievement)
                    <!-- Counter ITEM -->
                    <div class="col-lg-3 col-sm-6 mb-30">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="{{ $achievement->icon }}"></i>
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h2 class="counter">{{ $achievement->count }}</h2>
                                    <h3>+</h3>
                                </div>
                                <p>{{ $achievement->name }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Counter Area -->
            </div>
        </div>
    </section>
    <!-- End About Area -->
    <!-- Start Services Area -->
    <section class="services-area pt-40 pb-20" id="services">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>My Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                <!-- Services Single -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="services-box">
                        <div class="icon">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h2>{{ $service->name }}</h2>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Area -->
    <!-- Start Resume Area -->
    <section class="resume-area pt-20 pb-20">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>My Resume</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <div class="resume-box">
                        <h3>Education </h3>
                        <div class="resume__list">
                            @foreach ($resumes_educations as $resumes_education)
                            
                            <!-- Single -->
                            <div class="single-resume__list  wow fadeInUp">
                                <div class="year">
                                    <span>{{ date('Y',strtotime($resumes_education->start_date)) }}- {{ date('Y',strtotime($resumes_education->end_date)) }}</span>
                                </div>
                                <h4 class="university-name">{{ $resumes_education->orgamization }}</h4>
                                <p class="degree">{{ $resumes_education->experience }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="resume-box">
                        <h3> Experience </h3>
                        <div class="resume__list">
                            @foreach ($resumes_experiences as $resumes_experience)
                            <!-- Single -->
                            <div class="single-resume__list  wow fadeInUp">
                                <div class="year">
                                    <span>{{ date('Y',strtotime($resumes_experience->start_date)) }}- {{ date('Y',strtotime($resumes_experience->end_date)) }}</span>
                                </div>
                                <h4 class="university-name"> {{ $resumes_experience->orgamization }} </h4>
                                <p class="degree">{{ $resumes_experience->experience }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Resume Area -->
    <!-- Start Portfolio Area -->
    <section class="portfolio-area pt-20 pb-20" id="portfolio">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>My Portfolio</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-category mb-40 text-center">
                    <ul>
                        <li data-filter="all">All</li>
                        @foreach ($categories as $category)
                            
                        <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="row portfolio-full portF">
                    @foreach ($portfolios as $portfolio)
                    <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30 mix {{$portfolio->category->slug}}">
                        <div class="portfolio-item">
                            <img src="{{ asset('uploads/portfolio') }}/{{ $portfolio->image }}" alt="{{ $portfolio->image }}">
                            <div class="portfolio-item-overly">
                                <div class="portfolio-item-overly-full">
                                    <a href="jqury:0;" data-bs-toggle="modal" data-bs-target="#portfoliod_{{ $portfolio->id }}"><i
                                            class="fas fa-search-plus"></i></a>
                                    <a href="{{ $portfolio->link }}" >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('front.includes.portfolio')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Area -->
    <!-- Start Testimonial Area -->
    <section class="testimonial-area pt-20 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>Reviews</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial-full owl-carousel">
                    @foreach ($testimonials as $testimonial)
                    <!-- Single -->
                    <div class="testimonial-item">
                        <div class="thumbnail">
                            <img src="{{ asset($testimonial->photo) }}" alt="">
                        </div>
                        <div class="content">
                            @if ($testimonial->type == 1)
                            <img src="{{ asset($testimonial->review_photo) }}" alt="" height="90"/>
                            @else
                            <p>{{ $testimonial->review_text }}</p>
                            @endif
                            
                            <h2>{{ $testimonial->name }}</h2>
                            <h4>{{ $testimonial->title }}</h4>
                        </div>
                        <div class="btm-big-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->
    <!-- Start Latest Blog Area -->
    <section class="pt-20 pb-20 blog-area" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>Latest blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <!-- Single -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="blog-item">
                        <div class="thumbnail">
                            <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#blog_{{ $blog->id }}">
                                <img src="{{ asset($blog->photo) }}" alt="blog">
                            </a>
                        </div>
                        <div class="content">
                            <div class="meta">
                                <span><a href="javascript:void(0)"><i class="fas fa-user"></i> by: {{ $blog->user->name }}</a></span>
                                <span><a href="javascript:void(0)"><i class="fas fa-tags"></i> 
                                    @php
                                    $tages = json_decode($blog->tage, true);
                                   $tage_data = '';
                                     @endphp
                                     @foreach($tages as $tage)
                                     @php
                                         print_r($tage.' ');
                                     @endphp
                                     @endforeach
                                </a></span>
                            </div>
                            <h2 class="title"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#blog_{{ $blog->id }}">{{ $blog->name }} </a></h2>
                            <p>{{ $blog->description }} </p>
                            <div class="btm-meta">
                                <div class="date">
                                    <span><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('Y M d') }}</span>
                                </div>
                                <div class="read-more">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#blog_{{ $blog->id }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.includes.blog')
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Latest Blog Area -->
    <!-- Start Contact Area -->
    <section class="contact-area pt-20 pb-50" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding mb-40 text-center">
                        <h2>Contact Now</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 align-self-center mb-30">
                    <div class="contact-form">
                        @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('front.contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" name="name" placeholder="Your Name">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="email" name="email" placeholder="Your Email">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" name="number" placeholder="Your Phone">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" name="subject" placeholder="Your Subjects">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input">
                                        <textarea name="message" placeholder="Write Message" spellcheck="false"></textarea>
                                        <i class="fas fa-pen"></i>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="button-1">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="contact-form-info"
                        style="background-image:url('{{ asset('front_asset') }}/img/contact.jpg');">
                        <h2>Don't hesitate to contact Me</h2>
                        <div class="contact-info-list">
                            <div class="item mb-20">
                                <div class="icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="content">
                                    <h4>Locations</h4>
                                    <p>{{ setting()->address }}</p>
                                </div>
                            </div>
                            <div class="item mb-20">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>Drop A Mail</h4>
                                    <p>{{ setting()->email }}</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Call Me</h4>
                                    <p> {{ setting()->number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->
    <!-- Start Footer Area -->
    @include('front.includes.footer')
    <!-- End Footer Area -->
    <div class="scroll-area">
        <i class="fa fa-angle-up"></i>
    </div>

    <!-- Js File -->
    <script src="{{ asset('front_asset') }}/js/modernizr.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/popper.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('front_asset') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/jquery.nav.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/lightcase.js"></script>
    <script src="{{ asset('front_asset') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/wow.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/script.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('front_asset') }}/js/typescript.js"></script>
    <script src="{{ asset('front_asset') }}/js/typescript_demo.js"></script>
{!! Toastr::message() !!}
</body>

</html>
