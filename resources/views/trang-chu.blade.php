@extends('layouts.app')

@section('content')
           
            <!-- Start categori area -->
            <div class="categori-area">
                <div class="container">
                    <div class="row">
                        <!-- Start categori menu -->
                        <div class="col-lg-3">
                            <div class="categori-menu">
                                <div class="sidebar-menu-title">
                                    <h2><i class="fa fa-th-list"></i>Ngành hàng</h2>
                                </div>
                                <div class="sidebar-menu">
                                    <ul>
                                        @foreach($categories as $category)
                                        @if($category->parent_id == null)
                                        <li><a href="">{{ $category->name }}</a>
                                            <div class="megamenudown-sub">
                                                <div class="mega-top">
                                                    <div class="mega-item-menu">
                                                       @include('layouts.menu_dequy')
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End categori menu -->
                        <!-- Start categori banner -->
                        <div class="col-lg-9">
                            <!-- Start slider area -->
            <div class="slider-area">
                <div id="slider" class="nivoSlider">
                    <img style ="display:none" src="{{asset('app')}}/img/slider/1.jpg"  data-thumb="img/slider/1.jpg"  alt="" title="#htmlcaption1"/>      
                    <img style ="display:none" src="{{asset('app')}}/img/slider/2.jpg"  data-thumb="img/slider/2.jpg"  alt="" title="#htmlcaption2"/>
                </div>
                <div id="htmlcaption1" class="pos-slideshow-caption nivo-html-caption nivo-caption">
                    <div class="timing-bar"></div>
                    <div class="pos-slideshow-info pos-slideshow-info1">
                        <div class="container">
                            <div class="pos_description hidden-xs hidden-sm">
                                <div class="title1"><span class="txt">Camera Digital</span></div>
                                <div class="title2"><span class="txt">Brand D5500</span></div>
                                <div class="pos-slideshow-readmore">
                                    <a href="http://bootexperts.com/" title="Shop now">Shop now</a>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="htmlcaption2" class="pos-slideshow-caption nivo-html-caption nivo-caption">
                    <div class="timing-bar"></div>
                    <div class="pos-slideshow-info pos-slideshow-info2">
                        <div class="container">
                            <div class="pos_description hidden-xs hidden-sm">
                                <div class="title1"><span class="txt">Tivi Brand Name</span></div>
                                <div class="title2"><span class="txt">48" Full HD Flat TV</span></div>
                                <div class="pos-slideshow-readmore">
                                    <a href="#" title="Shop now">Shop now</a>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End slider area -->
                        </div>
                        <!-- End categori banner -->
                        
                        <!-- End categori slide product -->
                    </div>
                </div>
            </div>
            <!-- End categori area -->
            <!-- Start purches progress -->
            <div class="purches-progress-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="area-title">
                                <h3>Quy trình mua hàng</h3>
                            </div>
                        </div>
                        <div class="progress-area">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="progrtee-box icon">
                                        <h4>Bước 1</h4>
                                        <p>Lựa chọn sản phẩm của bạn</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="progrtee-box icon1">
                                        <h4>Bước 2</h4>
                                        <p>Kiểm tra giỏ hàng và thanh toán</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="progrtee-box icon2">
                                        <h4>Bước 3</h4>
                                        <p>Đóng gói và chuyển hàng</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="progrtee-box icon3">
                                        <h4>Bước 4</h4>
                                        <p>Nhận hàng và đánh giá</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- End purches progress -->
            <!-- Start featured product -->
            <div class="featured-product-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="area-title">
                                <h3>Sản phẩm mới</h3>
                            </div>
                        </div>
                        <div class="featured-product w-100">
                            <div class="featured-item">
                                @foreach($product_news as $product)
                                <!-- Start featured item -->
                                <div class="featured-inner">
                                    <div class="featured-image">
                                        <a href="{{ route('ui.product.detail',$product->id) }}">
                                            <img src="{{ $product->imageCover->path }}" alt="{{ $product->imageCover->fileName }}">
                                        </a>
                                        @if($product->oldPrice > $product->price)
                                        <span class="price-percent-reduction">{!! round(100 - ($product->price / $product->oldPrice) * 100,0)!!}% <span style='text-decoration:line-through'>{{ number_format($product->oldPrice,0,',','.') }}</span></span>
                                        @endif
                                    </div>
                                    <div class="featured-info">
                                        <a href="{{ route('ui.product.detail',$product->id) }}">{{ $product->name }}</a>
                                        <p class="reating">
                                            <span class="rate">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </p>
                                        <span class="price">{{ number_format($product->price,0,',','.') }}</span>
                                        <div class="featured-button">
                                            <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End featured item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End featured product -->
            <!-- Start mã giảm giá -->
            <div class="two-banner-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="banner-left banner-left-2">
                                <div class="banner-image">
                                    <a href="#">
                                        <img src="{{asset('app')}}/img/banner/cms14.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="banner-right">
                                <div class="banner-image">
                                    <a href="#">
                                        <img src="{{asset('app')}}/img/banner/cms15.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End mã giảm giá -->
            <!-- Start best sellar area -->
            <div class="best-sellar-area featured-product-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="area-title">
                                <h3>Bán chạy nhất</h3>
                            </div>
                        </div>
                        <div class="featured-product w-100">
                            <div class="featured-item">
                                <!-- Start featured item -->
                                <div class="featured-inner">
                                    <div class="featured-image">
                                        <a href="single-product.html">
                                            <img src="{{asset('app')}}/img/product/printed-dress1.jpg" alt="">
                                        </a>
                                        <span class="price-percent-reduction">-20%</span>
                                    </div>
                                    <div class="featured-info">
                                        <a href="single-product.html">Printed Dress</a>
                                        <p class="reating">
                                            <span class="rate">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </p>
                                        <span class="price">$26.00</span>
                                        <div class="featured-button">
                                            <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End featured item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <!-- Start brand and client -->
            <div class="brand-and-client">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="area-title">
                                <h3>ĐỐI TÁC VÀ KHÁCH HÀNG</h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="brand-logo featured-product-area">
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/1.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/2.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/3.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/4.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/5.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/6.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/1.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/3.jpg" alt=""></a>
                                </div>
                                <div class="clients">
                                    <a href="#"><img src="{{asset('app')}}/img/brand-logo/4.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End brand and client -->
            <!-- Start blog area -->
            <div class="blog-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="area-title">
                                <h3>TIN TỨC</h3>
                            </div>
                        </div>
                        <div class="blog-box featured-product-area">
                            <div class="col-lg-12">
                                <a href="single-blog.html"><img src="{{asset('app')}}/img/blog/4-home-default.jpg" alt=""></a>
                                <span class="blog-date">2019-08-12 04:40:21</span>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Share the Love for PrestaShop 1.6</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been...</p>
                                    <a href="single-blog.html" class="readmore">Read more<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="single-blog.html"><img src="{{asset('app')}}/img/blog/3-home-default.jpg" alt=""></a>
                                <span class="blog-date">2019-08-12 04:40:21</span>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Answers to your Questions about PrestaShop</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been...</p>
                                    <a href="single-blog.html" class="readmore">Read more<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="single-blog.html"><img src="{{asset('app')}}/img/blog/2-home-default.jpg" alt=""></a>
                                <span class="blog-date">2019-08-12 04:40:21</span>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">What is Bootstrap? – The History and the Hype</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been...</p>
                                    <a href="single-blog.html" class="readmore">Read more<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="single-blog.html"><img src="{{asset('app')}}/img/blog/1-home-default.jpg" alt=""></a>
                                <span class="blog-date">2019-08-12 04:40:21</span>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">From Now we are certified web agency</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been...</p>
                                    <a href="single-blog.html" class="readmore">Read more<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End blog area -->
          
            @endsection