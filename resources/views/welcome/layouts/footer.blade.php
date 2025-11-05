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
                            <h5 class="font-size-15 ml-4 mb-0">Receive <strong>$25 coupon for first shopping.</strong></h5>
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
                    @if($menu = menu('Footer Three'))
                    <h5 class="widget-title wow fadeIn animated">{{$menu->name}}</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        @foreach($menu->subMenus as $menu)
                        <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-lg-3">
                    @if($menu = menu('Footer Three'))
                    <h5 class="widget-title wow fadeIn animated">{{$menu->name}}</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        @foreach($menu->subMenus as $menu)
                        <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                        @endforeach
                    </ul>
                    @endif
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
                <p class="float-md-left font-sm text-muted mb-0">&copy; {{date('Y')}}, <strong class="text-brand">{{general()->title}}</strong> - All rights reserved.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    Designed by <a href="https://mdrabiul.com" target="_blank">MD Rabiul Kairm</a>.
                </p>
            </div>
        </div>
    </div>
</footer>