@php
$system_config = App\System_config::where('status','active')->where('kind','forUser')->get()->first();
@endphp

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cửa hàng SKEY PRO</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Khula:400,800,700,600,300' rel='stylesheet' type='text/css'>

    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('app') }}/style.css">

    <link rel="stylesheet" href="{{ asset('app') }}/css/owl.carousel.css">

    <script src="{{ asset('app') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <form action="logout" id='form_logout' method='post'>
        @csrf
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" defer></script>
</head>

<body class="home-1">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start main area -->
    <div class="main-area">
        <!-- Start header -->
        <header>
            <!-- Start top call-to acction -->
            <div class="top-bar-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top-call-to-acction">
                                <p>
                                    <a href="tel:{{ $system_config->phoneNumber1 }}"><i class="fa fa-phone"></i> Gọi cho chúng tôi: {{ $system_config->phoneNumber1 }}</a>
                                    <a href="mailto:{{ $system_config->email }}"><i class="fa fa-envelope-o"></i> E-mail:
                                        {{ $system_config->email }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-and-menu">
                                <div class="top-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="#">Vietnamese <i class="fa fa-caret-down"></i></a>
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">Vietnamese</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="top-social">
                                    <p>
                                        <a href="{{ $system_config->facebook }}"><i class="fa fa-facebook"></i></a>
                                        <a href="{{ $system_config->twitter }}"><i class="fa fa-twitter"></i></a>
                                        <a href="{{ $system_config->youtube }}"><i class="fa fa-youtube"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End top call-to acction -->
            <!-- Start logo and search area -->
            <div class="logo-and-search-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('app') }}/img/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Start user info adn search -->
                            <div class="user-info-adn-search">
                                <div class="user-info">
                                    <p>
                                        @guest
                                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập / Đăng ký</a>
                                        @endguest
                                        @auth 
                                        <a href="#"><i class="fa fa-user"></i> Cá nhân</a>
                                        <a href="#"><i class="fa fa-signal"></i> Lịch sử đặt hàng</a>
                                        <a href="#" id='btn_logout'><i class="fa fa-key"></i> Đăng xuất</a>
                                        @endauth
                                       
                                    </p>
                                </div>
                                <div class="search-and-cart">
                                    <div class="search-categori">
                                        <div class="categori">
                                            <form id="select-categoris" method="post" class="form-horizontal">
                                                <select name="language">
                                                    <option value="">Ngành hàng</option>
                                                    <option value="12">Automotive</option>
                                                    <option value="21">electronic </option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="search-box">
                                            <form action="#">
                                                <input type="text" class="form-control input-sm" maxlength="64"
                                                    placeholder="Tìm kiếm sản phẩm.." />
                                                <button type="submit">Tìm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="shoping-cart">
                                        <a href="cart.html"><span>Giỏ hàng <?php if(Auth::check() && Auth::user()->cart_products() != null){ echo '('.count(Auth::user()->cart_products()).')'; }; ?></span></a>
                                        <div class="add-to-cart-product">
                                            @if(Auth::check() && Auth::user()->cart_products() != null)
                                            @foreach(Auth::user()->cart_products() as $cart_product)
                                            <div class="cart-product">
                                                <div class="cart-product-image">
                                                    <a href=""><img
                                                            src="{{ $cart_product->product->imageCover->path }}"
                                                            alt="{{ $cart_product->product->imageCover->fileName }}"></a>
                                                </div>
                                                <div class="cart-product-info">
                                                    <p><span>{{ $cart_product->amount }}</span>x<a href="single-product.html">{{ $cart_product->product->name }}</a></p>
                                                    <span class="price">{{ number_format($product->price,0,',','.') }}</span>
                                                </div>
                                                <div class="cart-product-remove">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <div class="cart-checkout">
                                                <a href="checkout.html">Thanh toán<i class="fa fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End user info adn search -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End logo and search area -->
            <!-- Start mainmenu-area -->
            <div class="mainmenu-area">
                <div class="container">
                    <div class="row">
                        <div class="mainmenu">
                            <nav>
                                <ul>
                                    <li><a class="home" href="index.html">Trang chủ</a></li>
                                    <li><a href="about-us.html">Sản phẩm</a></li>
                                    <li><a href="shop-grid.html">Bài viết</a></li>
                                    <li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="contact-us.html">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End mainmenu-area -->
            <!-- Start mobile menu -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 np">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="nav">
                                        <li><a class="home" href="index.html">Trang chủ</a></li>
                                    <li><a href="about-us.html">Sản phẩm</a></li>
                                    <li><a href="shop-grid.html">Bài viết</a></li>
                                    <li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="contact-us.html">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End mobile menu -->
        </header>

        @yield('content')

        <!-- Start footer -->
        <footer>
            <!-- Start footer top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start footer top box -->
                        <div class="col-md-3">
                            <div class="footer-top-box">
                                <i class="fa fa-phone-square"></i>
                                <a href="tel:{{ $system_config->phoneNumber1 }}">{{ $system_config->phoneNumber1 }}</a>
                                <p>Liên hệ đặt hàng</p>
                            </div>
                        </div>
                        <!-- End footer top box -->
                        <!-- Start footer top box -->
                        <div class="col-md-3">
                            <div class="footer-top-box">
                                <i class="fa fa-clock-o"></i>
                                <span>Thời gian làm việc</span>
                                <p>Thứ 2 - Chủ Nhật: 8.00 - 21.00</p>
                            </div>
                        </div>
                        <!-- End footer top box -->
                        <!-- Start footer top box -->
                        <div class="col-md-3">
                            <div class="footer-top-box">
                                <i class="fa fa-paper-plane"></i>
                                <span>Miễn phí ship</span>
                                <p>cho đơn hàng > 100k</p>
                            </div>
                        </div>
                        <!-- End footer top box -->
                        <!-- Start footer top box -->
                        <div class="col-md-3">
                            <div class="footer-top-box last">
                                <i class="fa fa-history"></i>
                                <span>Hoàn tiền 100%</span>
                                <p>Trong vòng 30 ngày</p>
                            </div>
                        </div>
                        <!-- End footer top box -->
                    </div>
                </div>
            </div>
            <!-- End footer top -->
            <!-- Start footer medil -->
            <div class="footer-medil">
                <div class="container">
                    <div class="row">
                        <!-- Start footer search area -->
                        <div class="col-md-12">
                            <div class="footer-search-area">
                                <h4>Nhận thông báo từ chúng mình nhé</h4>
                                <form method="post" action="#">
                                    <div class="form-group">
                                        <button class="submitNew" name="submitNewsletter" type="submit">
                                            <i class="fa fa-envelope"></i>
                                        </button>
                                        <input type="text" placeholder="Enter your e-mail" size="18" name="email"
                                            id="newsletter-input" class="inputNew form-control grey newsletter-input">
                                    </div>
                                </form>
                                <div class="hiring">
                                    <div class="img_in"><img alt="icon" src="{{ asset('app') }}/img/hire_logo.jpg">
                                    </div>
                                    <div class="info">
                                        <h4>Chúng tôi đang tìm kiếm bạn đồng hành!</h4>
                                        <p>Bấm vào <a href="#">đây</a> để xem chi tiết</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End footer search area -->
                    </div>
                    <!-- Start footer medil information -->
                    <div class="footer-medil-information">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info-box">
                                    <h4>Thông tin cửa hàng</h4>
                                    <ul>
                                        <li>SKEY PRO VIỆT NAM YOUR BEST PLACE FOR SHOPPING ONLINE</li>
                                        <li>Địa chỉ: {{ $system_config->address1 }}</li>
                                        <li>{{ $system_config->phoneNumber1 }}</li>
                                        <li><a href="mailto:{{ $system_config->email }}">{{ $system_config->email }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <h4>Information</h4>
                                    <ul>
                                        <li class="item"><a title="Specials" href="#">Specials</a></li>
                                        <li class="item"><a title="New products" href="#"> New products</a></li>
                                        <li class="item"><a title="Best sellers" href="#"> Best sellers</a></li>
                                        <li class="item"><a title="Contact us" href="contact-us.html">Contact us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <h4><a href="#">Liên kết cá nhân</a></h4>
                                    <ul>
                                        <li class="item"><a title="Specials" href="#">Đơn hàng của tôi</a></li>
                                        <li class="item"><a title="New products" href="#">Kiểm tra vận đơn</a></li>
                                        <li class="item"><a title="Best sellers" href="#">Khiếu nại của tôi</a></li>
                                        <li class="item"><a title="Contact us" href="#">Cài đặt địa chỉ nhận hàng</a></li>
                                        <li class="item"><a title="Contact us" href="#">Nạp tiền vào tài khoản</a></li>
                                        <li class="item"><a title="Contact us" href="#">Cài đặt tài khoản</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <h4>Liên kết bài viết</h4>
                                    <ul>
                                        <li class="item"><a title="Specials" href="#">Giới thiệu sản phẩm A </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End footer medil information -->
                </div>
            </div>
            <!-- End footer medil -->
            <!-- Start footer copyright -->
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>Bản quyền thuộc về <a href="">SKEY PRO VIỆT NAM</a> từ năm &copy; 2021.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-card pull-right">
                                <img src="{{ asset('app') }}/img/payment.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End footer copyright -->
        </footer>
        <!-- End footer -->
    </div>
    <!-- End main area -->
    <!-- JS -->

    <!-- jquery-1.11.3.min js
  ============================================ -->
    <script src="{{ asset('app') }}/js/vendor/jquery-1.11.3.min.js"></script>


    <!-- popper js
  ============================================ -->
    <script src="{{ asset('app') }}/js/popper.min.js"></script>

    <!-- bootstrap js
  ============================================ -->
    <script src="{{ asset('app') }}/js/bootstrap.min.js"></script>

    <!-- owl.carousel.min js
  ============================================ -->
    <script src="{{ asset('app') }}/js/owl.carousel.min.js"></script>

    <!-- jquery.nivo.slider.pack js
        ============================================ -->
    <script src="{{ asset('app') }}/js/jquery.nivo.slider.pack.js"></script>

    <!-- jqueryui js
        ============================================ -->
    <script src="{{ asset('app') }}/js/jquery.fancybox.js"></script>

    <!-- jquery.scrollUp.min js
        ============================================ -->
    <script src="{{ asset('app') }}/js/jquery.scrollUp.min.js"></script>

    <!-- wow js
  ============================================ -->
    <script src="{{ asset('app') }}/js/wow.js"></script>

    <!-- jquery.meanmenu js
        ============================================ -->
    <script src="{{ asset('app') }}/js/jquery.meanmenu.js"></script>

    <!-- plugins js
  ============================================ -->
    <script src="{{ asset('app') }}/js/plugins.js"></script>

    <!-- main js
  ============================================ -->
    <script src="{{ asset('app') }}/js/main.js"></script>

    {{-- Custom script --}}
    <script defer>
        $(document).ready(function() {
            $("#btn_logout").click(function(event) {
                $("#form_logout").submit();
            });

            @if(session()->has('pop-error'))
            Swal.fire({
                title: "{{ session()->get('pop-error') }}",
                type: 'error',
                showCloseButton: true
            })
            @endif
            @if(session()->has('pop-message'))
            Swal.fire({
                title: "{{ session()->get('pop-message') }}",
                type: 'success',
                showCloseButton: true
            })
            @endif

        });

    </script>
</body>

</html>
