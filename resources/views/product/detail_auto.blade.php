@extends('layouts.app')
@section('content')
<div class="page-content section">
    <!-- Start breadcume area -->
    <div class="breadcume-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb">
                        <a title="Return to Home" href="{{ url('/') }}" class="home"><i class="fa fa-home"></i></a>
                        <span class="navigation-pipe">&gt;</span>
                        <a class="hidden-xs" title="Automotive & Motorcycle" href="index.html">{{ $product->category->getParent()->name }}</a>
                        <span class="hidden-xs navigation-pipe">&gt;</span>
                        {{ $product->category->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcume area -->
    <!-- Start single product area -->
    <div class="container">
        <div class="single-products row">
            <!-- Start single product image -->
            <div class="col-md-5">
                <div class="single-product-image"> 
                    <div id="content-eleyas">
                        <div id="my-tab-content" class="tab-content">
                            <?php $dem = 1; ?>
                            @foreach($product->images as $image)
                            <div class="tab-pane <?php echo ($dem == 1) ? 'active' :'' ?>" id="view{{ $dem }}">
                                <span class="new-box">
                                    <span class="new-label">New</span>
                                </span>
                                <a class="fancybox" href="{{ $image->path }}" data-fancybox-group="gallery" title="">
                                    <img src="{{ $image->path }}" alt="">
                                </a>
                            </div>
                            <?php $dem++; ?>
                            @endforeach
                        </div>
                        <div id="viewproduct" class="nav nav-tabs product-view" data-tabs="tabs">
                            <?php $dem2 = 1; ?>
                            @foreach($product->images as $image)
                            <div class="pro-view <?php echo ($dem2 == 1) ? 'active' : ''; ?>"><a href="#view{{ $dem2 }}" data-toggle="tab"><img src="{{ $image->path }}" alt=""></a></div>
                            <?php $dem2++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End single product image -->
            <!-- Start single product details -->
            <div class="col-md-7">
                <div class="single-product-details">
                    <h1>{{ $product->name }}</h1>
                    <p class="rating-and-review">
                        <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        <a href="#">Đã đánh giá (0)</a>
                    </p>
                    <h2><span>{{ number_format($product->price,0,',','.') }} đ </span><span style='text-decoration:line-through;color:black'>{{ number_format($product->oldPrice,0,',','.') }}</span></h2>
                    <p>{!! $product->shortDescription !!}</p>
                    <form method="post" action="#">
                        <div class="numbers-row">
                            <label>Số lượng</label>
                           <input type="number" name="french-hens" id="french-hens" value="1">
                        </div>
                    </form>
                    <p class="buttons_bottom_block no-print" id="add_to_cart">
                        <button class="exclusive" name="Submit" type="submit">
                            <span>Thêm vào giỏ hàng</span>
                        </button>
                    </p>
                    <p>
                        {{ $product->buyer_note }}
                    </p>
                </div>
            </div>
            <!-- End single product details -->
        </div>
    </div>
    <!-- End single product area -->
    <!-- Start single product info -->
    <div class="container">
        <div class="single-product-info">
            <div id="content-product-review">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav review-tab" data-tabs="tabs">
                            <li><a class="active" href="#info1" data-toggle="tab">Mô tả sản phẩm</a></li>
                            <li><a href="#info2" data-toggle="tab">Thông số kỹ thuật</a></li>
                            <li><a href="#info4" data-toggle="tab">Đánh giá</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div id="my-tab-content-2" class="tab-content">
                            <div class="tab-pane active" id="info1">
                                <p class="tab-info-one">{!! $product->longDescription !!}</p>
                            </div>
                            <div class="tab-pane" id="info2">
                                <table class="table-data-sheet">            
                                    <tbody>
                                        <tr class="odd">
                                            <td>Compositions</td>
                                            <td>Cotton</td>
                                        </tr>
                                        <tr class="even">
                                            <td>Styles</td>
                                            <td>Casual</td>
                                        </tr>
                                        <tr class="odd">
                                            <td>Properties</td>
                                            <td>Short Sleeve</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="info3">
                                <div class="tab-info-product">
                                    <!-- Start featured item -->
                                    <div class="featured-inner">
                                        <div class="featured-image">
                                            <a href="single-product.html">
                                                <img src="{{asset('app')}}/img/product/faded-short-sleeves-tshirt.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="featured-info">
                                            <a href="single-product.html">Faded Short Sleeves T-shirt</a>
                                            <span class="price">$16.51</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
                                    <!-- Start featured item -->
                                    <div class="featured-inner">
                                        <div class="featured-image">
                                            <a href="single-product.html">
                                                <img src="{{asset('app')}}/img/product/blouse.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="featured-info">
                                            <a href="single-product.html">Blouse</a>
                                            <span class="price">$27.00</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
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
                                            <span class="price">$26.00</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
                                    <!-- Start featured item -->
                                    <div class="featured-inner">
                                        <div class="featured-image">
                                            <a href="single-product.html">
                                                <img src="{{asset('app')}}/img/product/printed-dress2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="featured-info">
                                            <a href="single-product.html">Printed Dress</a>
                                            <span class="price">$50.00</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
                                    <!-- Start featured item -->
                                    <div class="featured-inner">
                                        <div class="featured-image">
                                            <a href="single-product.html">
                                                <img src="{{asset('app')}}/img/product/printed-summer-dress4.jpg" alt="">
                                            </a>
                                            <span class="price-percent-reduction">-20%</span>
                                        </div>
                                        <div class="featured-info">
                                            <a href="single-product.html">Printed Summer Dress</a>
                                            <span class="price">$28.00</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
                                    <!-- Start featured item -->
                                    <div class="featured-inner">
                                        <div class="featured-image">
                                            <a href="single-product.html">
                                                <img src="{{asset('app')}}/img/product/printed-summer-dress.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="featured-info">
                                            <a href="single-product.html">Printed Summer Dress</a>
                                            <span class="price">$30.00</span>
                                        </div>
                                    </div>
                                    <!-- End featured item -->
                                </div>
                            </div>
                            <div class="tab-pane" id="info4">
                                <div class="product-tab-review">
                                    <h5>Good</h5>
                                    <p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <span>eleyas ahmed</span>
                                    <span class="tab-tate-pro">25/11/2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End single product info -->
    <!-- Start featured product -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="area-title">
                        <h3>Có thể bạn quan tâm: </h3>
                    </div>
                </div>
                <div class="featured-product w-100">
                    <div class="featured-item">
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/faded-short-sleeves-tshirt.jpg" alt="">
                                </a>
                            </div>
                            <div class="featured-info">
                                <a href="single-product.html">Faded Short Sleeves T-shirt</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">$16.51</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/blouse.jpg" alt="">
                                </a>
                            </div>
                            <div class="featured-info">
                                <a href="single-product.html">Blouse</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">$27.00</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
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
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/printed-dress2.jpg" alt="">
                                </a>
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
                                <span class="price">$50.00</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/printed-summer-dress4.jpg" alt="">
                                </a>
                                <span class="price-percent-reduction">-20%</span>
                            </div>
                            <div class="featured-info">
                                <a href="single-product.html">Printed Summer Dress</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">$28.00</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/printed-summer-dress.jpg" alt="">
                                </a>
                            </div>
                            <div class="featured-info">
                                <a href="single-product.html">Printed Summer Dress</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">$30.00</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                        <!-- Start featured item -->
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="single-product.html">
                                    <img src="{{asset('app')}}/img/product/printed-chiffon-dress1.jpg" alt="">
                                </a>
                            </div>
                            <div class="featured-info">
                                <a href="single-product.html">Printed Chiffon Dress</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">$16.40</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End featured item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End featured product -->
</div>
@endsection
