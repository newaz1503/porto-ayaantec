<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="{{ asset('uploads/home/admin') }}/{{ Auth::user()->photo }}" alt="user-img"
                        class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown"
                        role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span
                            class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{ route('backend.adminProfile') }}" class="dropdown-item"><i class="ti-user"></i> My
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect" href="{{ route('home') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('backend.social.index') }}">Social Media </a></li>
                        <li><a href="{{ route('backend.general.info') }}">General</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.banner.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.about.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">About</span>
                    </a>
                </li>
              

                <li>
                    <a class="waves-effect" href="{{ route('backend.service.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">My Service</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.resume.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">My Resume</span>
                    </a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-speedometer"></i>
                    <span class="hide-menu">Portfolio</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('backend.category.index') }}">Category</a></li>
                    <li><a href="{{ route('backend.portfolio.index') }}">Portfolio</a></li>
                </ul>
            </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.review.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Review</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.blog.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Blogs</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('backend.contact.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">contact</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ route('front.clear') }}" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Cache Clear</span>
                    </a>
                </li>
               
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                        {{ __('Logout') }} aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
