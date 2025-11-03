{{--
<footer style="background-image:url({{asset(assetLink().'/images/footer-bg-3.png')}})">
    <div class="footerWidgetArea" >
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-widget">
                        <img src="{{asset(general()->logo())}}" alt="{{general()->title}}">
                        @if(general()->copyright_text)
                        <p>
                        {!!general()->copyright_text!!}
                        </p>
                        @endif
                        <p><b>Email:</b> {!!general()->email!!}</p>
                        <p><b>Hotline:</b> {!!general()->mobile!!}</p>
                        <div class="socialMenu">
                            <ul>
                                @if(general()->facebook_link)
                                <li><a href="{{general()->facebook_link}}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if(general()->twitter_link)
                                <li><a href="{{general()->twitter_link}}"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if(general()->instagram_link)
                                <li><a href="{{general()->instagram_link}}"><i class="fa fa-instagram"></i></a></li>
                                @endif
                                @if(general()->linkedin_link)
                                <li><a href="{{general()->linkedin_link}}"><i class="fa fa-linkedin"></i></a></li>
                                @endif
                                @if(general()->youtube_link)
                                <li><a href="{{general()->youtube_link}}"><i class="fa fa-youtube-play"></i></a></li>
                                @endif
                                @if(general()->pinterest_link)
                                <li><a href="{{general()->pinterest_link}}"><i class="fa fa-pinterest-p"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                        @if($menu = menu('Footer Two'))
                            <div class="footer-widget">
                                <h4>{{$menu->name}}</h4>
                                <ul class="footer-menu">
                                    @foreach($menu->subMenus as $menu)
                                    <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                        <div class="col-md-6">
                            @if($menu = menu('Footer Three'))
                                <div class="footer-widget">
                                    <h4>{{$menu->name}}</h4>
                                    <ul class="footer-menu">
                                        @foreach($menu->subMenus as $menu)
                                        <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h4>Office Location</h4>
                        <p><b>Address:</b> {!!general()->address_one!!}</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29186.920218312618!2d90.35768829914689!3d23.876671472604375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d05e7074dd%3A0xd1c58803049f00c7!2sUttara%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700193399770!5m2!1sen!2sbd" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cory-right-section">
        <span class="copyright">© {{date('Y')}} <a href="{{route('index')}}">{{general()->title}}</a> | All Rights Reserved. Design by <a href="www.natoreit.com" target="_blank">Natore-IT</a></span>
    </div>
</footer>
--}}
<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                            <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="form-subcriber d-flex wow fadeIn animated">
                        <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                        <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="index.html"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                            <strong>Address: </strong> {!!general()->address_one!!}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Phone: </strong>{{general()->mobile}}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong> {{general()->email}}
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            @if(general()->facebook_link)
                            <a href="{{general()->facebook_link}}"><i class="fab fa-facebook"></i></a>
                            @endif
                            @if(general()->twitter_link)
                            <a href="{{general()->twitter_link}}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(general()->instagram_link)
                            <a href="{{general()->instagram_link}}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(general()->linkedin_link)
                            <a href="{{general()->linkedin_link}}"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if(general()->youtube_link)
                            <a href="{{general()->youtube_link}}"><i class="fab fa-youtube-play"></i></a>
                            @endif
                            @if(general()->pinterest_link)
                            <a href="{{general()->pinterest_link}}"><i class="fab fa-pinterest-p"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    @if($menu = menu('Footer Two'))
                    <h5 class="widget-title wow fadeIn animated">{{$menu->name}}</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        @foreach($menu->subMenus as $menu)
                        <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">My Account</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Order</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="widget-title wow fadeIn animated">Category</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="#">Ladies Item</a></li>
                        <li><a href="#">T-shirt</a></li>
                        <li><a href="#">Woman Fasion</a></li>
                        <li><a href="#">Baby Callection</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Shirt and Pant</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">&copy; {{date('Y')}}, <strong class="text-brand">Evara</strong> - HTML Ecommerce Template </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    Designed by <a href="http://alithemes.com" target="_blank">Alithemes.com</a>. All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>