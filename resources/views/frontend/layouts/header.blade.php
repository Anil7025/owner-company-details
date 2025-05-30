<header class="header-area header-style-1 header-height-2">
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap mt-1 header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img class="width:80px" src="{{ asset('frontend/images/vendor/vendor-1.png')}}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <div class="logo logo-width-1">
                            <a href="{{url('/')}}"><img class="width:80px" src="{{ asset('frontend/images/vendor/vendor-1.png')}}" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active" href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{url('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-wrap">
                    <div class="header-right">
                        {{-- <div class="search-style-2">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search for items..." required/>
                            </form>
                        </div> --}}
                        <div class="header-action-right">
                            <div class="header-action-2">
                                
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="sutta mart" src="{{ asset('frontend/images/theme/icons/icon-user.svg')}}" />
                                    </a>
                                    {{-- <a href="#"><span class="lable ml-0">Account</span></a> --}}
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        @php $user = Auth::user(); @endphp
                                        @if($user)
                                        <ul>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Profile Setting</a>
                                            </li>
                                            <li>
                                                <a href="page-login.html"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                            </li>
                                        </ul>
                                        @else
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-user mr-10"></i>Sign In</a>
                                            </li>
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-action-right-mobile text-right">
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="sutta mart" src="{{ asset('frontend/images/theme/icons/icon-user.svg')}}" />
                                </a>    
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Profile Setting</a>
                                        </li>
                                        <li>
                                            <a href="page-login.html"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{url('/')}}"><img class="width:80px"src="{{ asset('frontend/images/vendor/vendor-1.png')}}" alt="logo" /></a>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('about-us')}}">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('contact')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="{{url('/login')}}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+91) - 7827422855 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('frontend/images/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/images/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/images/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/images/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/images/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2025 © Client. All rights reserved. Powered by Anil.</div>
        </div>
    </div>
</div>