@extends('layouts.frontend')
@section('title', Config::get('siteSetting.title'))
@section('metatag')
    <meta name="description" content="Multipurpose eCommerce website">

    <meta name="keywords" content="Multipurpose, eCommerce, website" />

    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="{{ url()->full() }}">
    <link rel="amphtml" href="{{ url()->full() }}" />
    <link rel="alternate" href="{{ url()->full() }}">

    <!-- Schema.org for Google -->

    <meta itemprop="description" content="Multipurpose eCommerce website">
    <meta itemprop="image" content="{{asset('frontend')}}/images/logo/logo.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="Multipurpose eCommerce website">
    <meta name="twitter:title" content="Multipurpose eCommerce website">
    <meta name="twitter:description" content="Multipurpose eCommerce website">
    <meta name="twitter:site" content="{{url('/')}}">
    <meta name="twitter:creator" content="@Neyamul">
    <meta name="twitter:image:src" content="{{asset('frontend')}}/images/logo/logo.png">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:description" content="Multipurpose eCommerce website">
    <meta name="og:image" content="{{asset('frontend')}}/images/logo/logo.png">
     <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="Bdtype">
    <meta name="og:locale" content="en">
    <meta name="og:type" content="website">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="article">
@endsection

@section('content')
        @if(Config::get('siteSetting.slider'))
        <!-- Slider Arae Start -->
        @include('frontend.sliders.slider')
        <!-- Slider Arae End -->
        @endif

        @if(Config::get('siteSetting.services'))
        <!-- Services Area Start -->
        <section class="static-area">
            <div class="container">
                <div class="static-area-wrap">
                    <div class="row">

                        @foreach($services as $service)
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                            <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">   @if($service->image)
                                <img src="{{asset('upload/images/services/'.$service->image)}}" alt="image" class="img-responsive" />
                                @endif
                                @if($service->font)
                                <i style="font-size: 40px;padding-right: 8px;" class="{{$service->font}}"></i>
                                @endif
                                <div class="single-static-meta">
                                    <h4>{{$service->title}}</h4>
                                    <p>{{$service->subtitle}}</p>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Static Area End -->
        @endif   

       

        @if(Config::get('siteSetting.category'))
        <!-- Category Area Start -->
        <section class="categorie-area mb-60px mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Popular Categories</h2>
                            <p>Add Popular Categories to weekly line up</p>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Category Area Start -->
                
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-3">
                        <div class="category-list border">
                            <div class="category-thumb" style="float: right;">
                                <a href="shop.php">
                                    <img src="{{asset('frontend')}}/images/product-image/electronic/thumb-1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="desc-listcategoreis" style="float: left;">
                                <div class="name_categories">
                                    <h4>{{$category->name}}</h4>
                                </div>
                                <span class="number_product">17 Products</span>
                                <a href="shop.php"> Shop Now <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Category Area End  -->     
        @endif

        @if(Config::get('siteSetting.feature_products'))
        <!-- Feature products Area Start -->
        <section class="feature-area">
            <div class="container">
               <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Feature Products</h2>
                            <p>Add new products to weekly line up</p>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Recent Product slider Start -->
                <div class="best-sell-slider owl-carousel owl-nav-style-3">
                    <!-- Product Single Item -->
                   
                    @foreach($products as $product)
                    <div class="product-inner-item">
                        @include('frontend.products.products')
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Feature products Area End -->
        @endif
      
         <!-- Hot Deal products Area Start -->
        <section class="feature-area">
            <div class="container">
               <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Hot Deal Products</h2>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Recent Product slider Start -->
                <div class="best-sell-slider home-furniture owl-carousel owl-nav-style-3">
                    
                    <!-- Product Single Item -->
                    @foreach($products as $product)

                    <div class="product-inner-item">

                        <article class="list-product mb-30px">
                            <div class="img-block">
                                <a href="{{ route('product_details', $product->slug) }}" class="thumbnail">
                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/furniture/8.jpg" alt="" />
                                </a>
                                <div class="add-to-link">
                                    <ul>
                                        <li>
                                            <a href="#" title="Add to Cart"><i class="ion-bag"></i></a>
                                        </li>
                                        <li>
                                            <a href="wishlist.php" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li>
                                            <a href="compare.php" title="Compare"><i class="ion-ios-shuffle-strong"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal"><i class="ion-ios-search-strong"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                
                                <h2><a href="{{ route('product_details', $product->slug) }}" class="product-link">{{Str::limit($product->title, 22)}}</a></h2>
                                <div class="clockdiv"><div data-countdown="2021/03/01"></div></div>
                                <div class="rating-product">
                                    @for($i=1; $i<=5; $i++)
                                    <i class="ion-android-star"></i>
                                    @endfor
                                </div>
                                <div class="pricing-meta">
                                    <ul> 
                                        @if($product->discount)
                                        <li class="old-price"> {{ Config::get('siteSetting.currency_symble') }}{{$product->selling_price}}</li>
                                        <li class="current-price">{{ Config::get('siteSetting.currency_symble') }}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</li>
                                        <li class="discount-price">-{{$product->discount}}%</li>
                                        @else
                                        <li class="old-price not-cut">{{ Config::get('siteSetting.currency_symble') }}{{$product->selling_price}}</li>
                                        @endif
                                       
                                    </ul>
                                </div>
                            </div>
                        </article>
                       
                    </div>
                    @endforeach
                       
                </div><!-- Product Single Item --> 
            </div>
        </section>
        <!-- Feature products Area End -->

        <!-- Banner Area Start -->
        <div class="banner-3-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-res-xs-30">
                        <div class="banner-wrapper banner-box">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/30.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-wrapper mb-30px">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/24.jpg" alt="" /></a>
                        </div>
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/25.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
         <!-- Banner Area Start -->
        <div class="banner-3-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                        <div class="banner-wrapper banner-box">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/31.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                        <div class="banner-wrapper banner-box">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/32.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="banner-wrapper banner-box">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/33.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        <div class="banner-area-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-inner">
                            <a href="shop.php"><img src="{{asset('frontend')}}/images/banner-image/28.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Area Start -->
        <div class="banner-3-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/48.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('frontend')}}/images/banner-image/49.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
   
        @if(Config::get('siteSetting.best_seller'))
        <!-- Best Sells Area Start -->
        <section class="best-sells-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2>Best Sellers</h2>
                            <p>Add bestselling products to weekly line up</p>
                        </div>
                        <!-- Section Title Start -->
                    </div>
                </div>
                <!-- Best Sell Slider Carousel Start -->
                <div class="best-sell-slider owl-carousel owl-nav-style">
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Juicy Quilted Ter..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€18.90</li>
                                    <li class="current-price">€34.21</li>
                                    <li class="discount-price">-5%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh Foam Ka..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€18.90</li>
                                    <li class="current-price">€15.12</li>
                                    <li class="discount-price">-20%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/3.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/4.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNER</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol All Terrain Ano..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/5.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/6.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNER</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Tricot Logo Strip..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/7.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Arishi Sport v1</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/9.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNAR</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Fila Locker Room Varsity Jacket</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Water and Wind Resistant Ins..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/12.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/12.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">New Luxury Men's Slim Fit Shi...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€29.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/13.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/13.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Originals Kaval Windbreaker...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€23.90</li>
                                    <li class="current-price">€21.51</li>
                                    <li class="discount-price">-10%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol All Terrain Anor...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Madden by Steve Madden Cale 6</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€11.90</li>
                                    <li class="current-price">€10.12</li>
                                    <li class="discount-price">-15%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/3.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/4.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Juicy Quilted Ter..</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€35.90</li>
                                    <li class="current-price">€34.11</li>
                                    <li class="discount-price">-5%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                </div>
                <!-- Best Sell Slider Carousel End -->
            </div>
        </section>
        <!-- Best Sell Area End -->
        @endif

    
        <!-- New Arrivals Add Product Area Start -->
        <section class="recent-add-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title">
                            <h2>New Arrivals</h2>
                            <p>Add products to weekly line up</p>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Recent Product slider Start -->
                <div class="recent-product-slider owl-carousel owl-nav-style">
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-11.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-12.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Originals Kaval Windbr...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€23.90</li>
                                    <li class="current-price">€21.51</li>
                                    <li class="discount-price">-10%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-1.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-1.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Juicy Quil...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€35.90</li>
                                    <li class="current-price">€34.21</li>
                                    <li class="discount-price">-5%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-3.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-4.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNER</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol All Terrai...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€29.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-6.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-6.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNER</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Arishi Spo...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€29.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-22.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-15.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>GRAPHIC CORNER</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Calvin Klein Jeans Refle...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€29.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-14.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-14.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Madden by Steve Madd...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price">€12.90</li>
                                    <li class="current-price">€10.21</li>
                                    <li class="discount-price">-10%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-17.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-16.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Trans-Weight Hooded...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€11.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{ route('product_details') }}" class="thumbnail">
                                <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-9.jpg" alt="" />
                                <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-9.jpg" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">New</li>
                        </ul>
                        <div class="product-decs">
                            <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                            <h2><a href="{{ route('product_details') }}" class="product-link">Water and Wind Resist...</a></h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€11.90</li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <!-- Single Item -->
                </div>
                <!-- Recent product slider end -->
            </div>
        </section>
        <!-- New Arrivals product area end -->


        <!-- Category Product  Area start-->
        <section class="category-product-area home-10">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-9">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-4">
                                <!-- Section Title -->
                                <div class="section-title">
                                    <h2>Audio & Video</h2>
                                </div>
                                <!-- Section Title -->
                                <div class="category-product-slider owl-carousel responsive-owl-nav-style owl-nav-style">
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Water and Wind...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/14.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Originals Kaval Win...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/3.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/4.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/5.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/6.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/7.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Originals Kaval Win...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/9.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/12.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/13.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Originals Kaval Win...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-4">
                                <!-- Section Title -->
                                <div class="section-title mt-res-sx-30px mt-res-md-30px">
                                    <h2>Camera & Photo</h2>
                                </div>
                                <!-- Section Title -->
                                <div class="category-product-slider owl-carousel responsive-owl-nav-style owl-nav-style">
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/5.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/6.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/7.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol Terr...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/9.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/14.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol Terr...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€10.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/3.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/4.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€20.90</li>
                                                        <li class="current-price">€15.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/9.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Brixton Patrol Terr...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Balance Fresh...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-4">
                                <!-- Section Title -->
                                <div class="section-title mt-res-sx-30px mt-res-md-30px">
                                    <h2>Smart Electronics</h2>
                                </div>
                                <!-- Section Title -->
                                <div class="category-product-slider owl-carousel responsive-owl-nav-style owl-nav-style">
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/12.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/13.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Water and Wind...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€29.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/11.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Luxury Men's...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€19.90</li>
                                                        <li class="current-price">€15.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Trans-Weight Ho...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€14.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/5.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/6.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€12.90</li>
                                                        <li class="current-price">€11.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/7.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/8.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Luxury Slim...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€9.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/9.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/10.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Trans-Weight Ho...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€29.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                    <div class="feature-slider-item">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/1.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Juicy Couture Solid...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€15.90</li>
                                                        <li class="current-price">€10.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/2.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/14.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">New Luxury Slim...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price not-cut">€9.90</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ route('product_details') }}" class="thumbnail">
                                                    <img class="first-img" src="{{asset('frontend')}}/images/product-image/electronic/3.jpg" alt="" />
                                                    <img class="second-img" src="{{asset('frontend')}}/images/product-image/electronic/4.jpg" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-decs">
                                                <a class="inner-link" href="shop.php"><span>STUDIO DESIGN</span></a>
                                                <h2><a href="{{ route('product_details') }}" class="product-link">Trans-Weight Ho...</a></h2>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                                <div class="pricing-meta">
                                                    <ul>
                                                        <li class="old-price">€25.90</li>
                                                        <li class="current-price">€21.51</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-12 d-lg-none d-xl-block col-xl-3 mtb-res-sm-30 mtb-res-md-30">
                        <div class="banner-inner">
                            <a href="shop.php"><img src="{{asset('frontend')}}/images/banner-image/29.jpg" alt="" class="img-responsive" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category Product  Area end-->

        <!-- Blog area Start -->
        <section class="blog-area mb-30px mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section title -->
                        <div class="section-title">
                            <h2>Latest Blogs</h2>
                            <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                        </div>
                        <!-- Section title -->
                    </div>
                </div>
                <!-- Blog Slider Start -->
                <div class="blog-slider-active owl-carousel owl-nav-style">
                    <!-- single item -->
                    <article class="blog-post">
                        <div class="blog-post-top">
                            <div class="blog-img">
                                <img src="{{asset('frontend')}}/images/blog-image/blog-5.jpg" alt="" />
                            </div>
                        </div>
                        <div class="blog-post-content d-flex">
                            <div class="blog-post-content-cell">
                                <a href="blog-grid-left-sidebar.php" class="blog-meta">Digital</a>
                                <h4 class="blog-post-heading"><a href="blod-details.php">This is First Post For XipBlog</a></h4>
                                <p class="blog-text">
                                    Lorem Ipsum is simply dummy text of the printing and typeSettings industry. Lorem Ipsum has been the industrys ...
                                </p>
                                <a class="read-more-btn" href="blod-details.php"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                    </article>
                    <!-- single item -->
                    <article class="blog-post">
                        <div class="blog-post-top">
                            <div class="blog-img">
                                <img src="{{asset('frontend')}}/images/blog-image/blog-6.jpg" alt="" />
                            </div>
                        </div>
                        <div class="blog-post-content d-flex">
                            <div class="blog-post-content-cell">
                                <a href="blog-grid-left-sidebar.php" class="blog-meta">Digital</a>
                                <h4 class="blog-post-heading"><a href="blod-details.php">This is Secound Post For XipBlog</a></h4>
                                <p class="blog-text">
                                    Lorem Ipsum is simply dummy text of the printing and typeSettings industry. Lorem Ipsum has been the industrys ...
                                </p>
                                <a class="read-more-btn" href="blod-details.php"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                    </article>
                    <!-- single item -->
                    <article class="blog-post">
                        <div class="blog-post-top">
                            <div class="blog-img">
                                <img src="{{asset('frontend')}}/images/blog-image/blog-7.jpg" alt="" />
                            </div>
                        </div>
                        <div class="blog-post-content d-flex">
                            <div class="blog-post-content-cell">
                                <a href="blog-grid-left-sidebar.php" class="blog-meta">Digital</a>
                                <h4 class="blog-post-heading"><a href="blod-details.php">This is Thrid Post For XipBlog</a></h4>
                                <p class="blog-text">
                                    Lorem Ipsum is simply dummy text of the printing and typeSettings industry. Lorem Ipsum has been the industrys ...
                                </p>
                                <a class="read-more-btn" href="blod-details.php"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                    </article>
                    <!-- single item -->
                    <article class="blog-post">
                        <div class="blog-post-top">
                            <div class="blog-img">
                                <img src="{{asset('frontend')}}/images/blog-image/blog-8.jpg" alt="" />
                            </div>
                        </div>
                        <div class="blog-post-content">
                            <a href="blog-grid-left-sidebar.php" class="blog-meta">Fashion</a>
                            <h4 class="blog-post-heading"><a href="blod-details.php">This is Foruth Post For XipBlog</a></h4>
                            <p class="blog-text">
                                Lorem Ipsum is simply dummy text of the printing and typeSettings industry. Lorem Ipsum has been the industrys ...
                            </p>
                            <a class="read-more-btn" href="blod-details.php"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                        </div>
                    </article>
                    <!-- single item -->
                </div>
                <!-- Blog Slider Start -->
            </div>
        </section>
        <!-- Blog Area End -->

        @if(Config::get('siteSetting.brand'))
        <!-- Category Area Start -->
        <section class="categorie-area mb-60px mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Shop By Brand</h2>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Category Area Start -->
                
                <div class="row">
                    @foreach($brands as $brand)
                    <div class="col-md-2">
                        <div class="category-list border">
                            <div class="category-thumb" style="float: right;width: 50%;">
                                <a href="shop.php">
                                    <img width="95" src="{{asset('upload/images/brand/thumb/'.$brand->logo)}}" alt="brand-image" />
                                </a>
                            </div>
                            <div class="desc-listcategoreis" style="float: left;width: 50%;">
                                <div class="name_categories">
                                    <h4>{{$brand->name}}</h4>
                                </div>
                                <span class="number_product">17 Products</span>
                                <a href="#"> Shop Now <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Category Area End  -->     
        @endif

        <!-- Patner area start -->
        <div class="brand-area">
            <div class="container">
                <div class="brand-slider owl-carousel owl-nav-style owl-nav-style-2">
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/1.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/2.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/3.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/4.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/5.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/1.jpg" alt="" /></a>
                    </div>
                    <div class="brand-slider-item">
                        <a href="#"><img src="{{asset('frontend')}}/images/brand-logo/2.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Patner area end -->

        <!-- Testimonial Area Start -->
        <section class="testimonial-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title">
                            <h2>Client Testimonials</h2>
                            <p>What our happy customers says !</p>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Testimonial Slider Start -->
                <div class="testi-slider owl-carousel owl-dot-style">
                    <!-- Single item -->
                    <div class="testi-slider-wrapper">
                        <div class="testi-slider-inner">
                            <div class="testi-img">
                                <img src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                            </div>
                            <div class="testi-content">
                                <div class="testi-content-text">
                                    All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !
                                </div>
                                <div class="author-text">
                                    <h4>orando BLoom <span>demo@posthemes.com</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single item -->
                    <div class="testi-slider-wrapper">
                        <div class="testi-slider-inner">
                            <div class="testi-img">
                                <img src="{{asset('frontend')}}/images/testimonial-image/2.png" alt="" />
                            </div>
                            <div class="testi-content">
                                <div class="testi-content-text">
                                    All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !
                                </div>
                                <div class="author-text">
                                    <h4>orando BLoom <span>demo@posthemes.com</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single item -->
                    <div class="testi-slider-wrapper">
                        <div class="testi-slider-inner">
                            <div class="testi-img">
                                <img src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                            </div>
                            <div class="testi-content">
                                <div class="testi-content-text">
                                    All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !
                                </div>
                                <div class="author-text">
                                    <h4>orando BLoom <span>demo@posthemes.com</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single item -->
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </section>
        <!-- Testimonial Area end -->
@endsection