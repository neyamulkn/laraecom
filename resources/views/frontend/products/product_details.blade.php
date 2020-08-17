@extends('layouts.frontend')
@section('title', $product->title)
@section('metatag')
    <meta name="description" content="{!! strip_tags($product->description) !!}">
    <meta name="image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta name="rating" content="5">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="{{$product->title}}">
    <meta itemprop="description" content="{!! strip_tags($product->description) !!}">
    <meta itemprop="image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$product->title}}">
    <meta name="twitter:description" content="{!! strip_tags($product->description) !!}">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:creator" content="{{$product->user->name}}">
    <meta name="twitter:image:src" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->
    
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="{{$product->title}}">
    <meta name="og:description" content="{!! strip_tags($product->description) !!}">
    <meta name="og:image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="HOTLancer">
    <meta name="og:locale" content="en">
    <meta name="og:video" content="#">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="product">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "category":"Corporate",
      "name": "{{$product->title}}",
      "image": [
        "{{asset('upload/images/product/'.$product->feature_image) }}"
       ],
      "description": "{!! strip_tags($product->description) !!}",
      "sku": "HOTLancer",
      "mpn": "925872",
      "brand": {
        "@type": "Thing",
        "name": "HOTLancer"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "{{$product->user->name}}"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.4",
        "reviewCount": "89"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{ url()->full() }}",
        "priceCurrency": "USD",
        "price": "{{ $product->selling_price }}",
        "priceValidUntil": "{!!  \Carbon\Carbon::parse($product->created_at)->format('M d, Y') !!}",
        "itemCondition": "https://schema.org/UsedCondition",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "name": "{{$product->user->name}}"
        }
      }
    }
    </script>

@endsection

@section('css')   
<style>
.single-review{border-bottom: 1px solid #eff0f5;padding: 10px;}
.single-review .review-img{float: left;flex: inherit;}
.single-review .review-top-wrap{margin:0px;}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 100%; height: 18px; background-color: #ff9800;}
.bar-4 {width: 30%; height: 18px; background-color: #ff9800;}
.bar-3 {width: 10%; height: 18px; background-color: #ff9800;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #ff9800;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}

.review-filterSort {
    height: 44px;
    padding-left: 10px;
    margin: 10px 0;
    border-top: 1px solid #eff0f5;
    border-bottom: 1px solid #eff0f5;
}
.review-filterSort .filterSort {
    float: right;
    display: inline-block;
    padding: 0 12px;
    height: 44px;
    line-height: 44px;
    border-left: 1px solid #eff0f5;
    font-size: 13px;
    color: #757575;
    cursor: pointer;
}


.review-filterSort .title {
    display: inline-block;
    height: 44px;
    line-height: 44px;
    font-size: 14px;
    color: #212121;
}

.availability.in-stock span {
    color: #fff;
    background-color: #5cb85c;
    padding: 5px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: bold;
}

/*text more & less*/

a.morelink {
    text-decoration:none;
    outline: none;
}
.morecontent span {
    display: none;
}
/*text more & less*/
</style>
@endsection
@section('content')
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb-links">
                            <li><a href="{{route('home.category', $product->get_category->slug) }}">{{$product->get_category->name}}</a></li>
                            <li><a href="{{route('home.category', [$product->get_category->slug, $product->get_subcategory->slug]) }}">{{$product->get_subcategory->name}}</a></li>
                            @if($product->get_childcategory)
                            <li><a href="{{route('home.category', [$product->get_category->slug, $product->get_subcategory->slug, $product->get_childcategory->slug]) }}">{{$product->get_childcategory->name}}</a></li>
                            @endif
                            <li>{{$product->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop details Area start -->
    <section class="product-details-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-img product-details-tab">
                        <div class="zoompro-wrap zoompro-2">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" src="{{asset('frontend')}}/images/product-image/organic/product-11.jpg" data-zoom-image="{{asset('frontend')}}/images/product-image/organic/zoom/1.jpg" alt="" />
                            </div>
                        </div>
                        <div id="gallery" class="product-dec-slider-2">
                            <a class="active" data-image="{{asset('frontend')}}/images/product-image/organic/product-11.jpg" data-zoom-image="{{asset('frontend')}}/images/product-image/organic/zoom/1.jpg">
                                <img src="{{asset('frontend')}}/images/product-image/organic/product-11.jpg" alt="" />
                            </a>
                            <a data-image="{{asset('frontend')}}/images/product-image/organic/product-9.jpg" data-zoom-image="{{asset('frontend')}}/images/product-image/organic/zoom/2.jpg">
                                <img src="{{asset('frontend')}}/images/product-image/organic/product-9.jpg" alt="" />
                            </a>
                            <a data-image="{{asset('frontend')}}/images/product-image/organic/product-20.jpg" data-zoom-image="{{asset('frontend')}}/images/product-image/organic/zoom/3.jpg">
                                <img src="{{asset('frontend')}}/images/product-image/organic/product-20.jpg" alt="" />
                            </a>
                            <a data-image="{{asset('frontend')}}/images/product-image/organic/product-19.jpg" data-zoom-image="{{asset('frontend')}}/images/product-image/organic/zoom/4.jpg">
                                <img src="{{asset('frontend')}}/images/product-image/organic/product-19.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h2>{{$product->title}}</h2>
                       
                        <div class="pro-details-rating-wrap">
                            
                            <div class="rating-product">
                               @for($i=1; $i<=5; $i++)
                                    <i class="ion-android-star"></i>
                                @endfor
                            </div>
                            <span class="read-review"><a class="reviews" href="#"> reviews (1)</a></span>
                            <!-- <p class="reference">Reference:<span> demo_17</span></p> -->
                           
                        </div>
                         @if($product->get_brand)<p>Brand: {{$product->get_brand->name}} | @endif More </p>
                         <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
                        <div class="pricing-meta">
                            <ul>
                                @if($product->discount)
                                <li class="current-price" style="font-size: 30px;margin-bottom: 0px">{{Config::get('currency_symble')}}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</li><br>
                                <li class="old-price" style="margin:0px;font-size: 20px; "> {{Config::get('currency_symble')}}{{$product->selling_price}}</li>
                                
                                <li>-{{$product->discount}}%</li>
                                @else
                                <li class="old-price not-cut">{{Config::get('currency_symble')}}{{$product->selling_price}}</li>
                                @endif
                            </ul>
                        </div>
                       
                        <div class="pro-details-list">
                            <ul>
                                <li>- 0.5 mm Dail</li>
                                <li>- Inspired vector icons</li>
                                <li>- Very modern style</li>
                            </ul>
                        </div>
                        <div class="pro-details-size-color d-flex">

                             @foreach ($product->get_features as $feature)
                                @foreach($feature->get_attribute as $attribute)
                                    

                                    <div class="product-size">
                                        <span> {{$attribute->name}}</span>
                                        <select>
                                            @foreach($attribute->get_attrValues as $attrValue)
                                                <option value="1">{{ $attrValue->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div >
                                            <span>Color</span>
                                            <div >
                                                <ul>
                                                    <li ><input  id="brand" type="checkbox" />
                                                    <label for="brand" ><i style="color: red"> White</label></li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                @endforeach
                            @endforeach
                            
                           
                        </div>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#"> + Add To Cart</a>
                            </div>
                        </div>
                        <div class="pro-details-wish-com">
                            <div class="pro-details-wishlist">
                                <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                            </div>
                            <div class="pro-details-compare">
                                <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                            </div>
                        </div>
                        <div class="pro-details-social-info">
                            <span>Share</span>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pro-details-policy">
                            <ul>
                                <li><img src="{{asset('frontend')}}/images/icons/policy.png" alt="" /><span>Security Policy (Edit With Customer Reassurance Module)</span></li>
                                <li><img src="{{asset('frontend')}}/images/icons/policy-2.png" alt="" /><span>Delivery Policy (Edit With Customer Reassurance Module)</span></li>
                                <li><img src="{{asset('frontend')}}/images/icons/policy-3.png" alt="" /><span>Return Policy (Edit With Customer Reassurance Module)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop details Area End -->
    <!-- product details description area start -->
    <div class="description-review-area mb-60px">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-toggle="tab" href="#des-details1">Description</a>
                    <a class="active" data-toggle="tab" href="#des-details2">Product Spe</a>
                    <a data-toggle="tab" href="#des-details3">Reviews (2)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-anotherinfo-wrapper">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane">
                        <div class="product-description-wrapper">
                            {!!$product->description!!}
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img width="50" src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star checked"></i>
                                                        <i class="fa fa-star checked"></i>
                                                        <i class="fa fa-star checked"></i>
                                                        <i class="fa fa-star checked"></i>
                                                        <i class="fa fa-star "></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review child-review">
                                        <div class="review-img">
                                            <img src="{{asset('frontend')}}/images/testimonial-image/2.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Email" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="Message"></textarea>
                                                        <input type="submit" value="Submit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->

    <section class="mb-60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>Customer reviews</h2>
                        <p>Add Related products to weekly line up</p>
                    </div>
                    <!-- Section Title -->
                </div>
            </div>  
            <div class="row">
                <div class="col-md-4">
                    <h1 class="heading">User Rating</h1>
                    <p style="font-size: 30px;padding: 10px 0;"><span style="font-size: 50px">4.8</span>/5</p>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <p>4.1 average based on 254 reviews.</p>
                    
                    <a href="#">Write Your review</a>

                </div>
                <div class="col-md-8">
                    <div class="side">
                    <div>5 star</div>
                    </div>
                    <div class="middle">
                    <div class="bar-container">
                    <div class="bar-5"></div>
                    </div>
                    </div>
                    <div class="side right">
                    <div>150</div>
                    </div>
                    <div class="side">
                    <div>4 star</div>
                    </div>
                    <div class="middle">
                    <div class="bar-container">
                    <div class="bar-4"></div>
                    </div>
                    </div>
                    <div class="side right">
                    <div>63</div>
                    </div>
                    <div class="side">
                    <div>3 star</div>
                    </div>
                    <div class="middle">
                    <div class="bar-container">
                    <div class="bar-3"></div>
                    </div>
                    </div>
                    <div class="side right">
                    <div>15</div>
                    </div>
                    <div class="side">
                    <div>2 star</div>
                    </div>
                    <div class="middle">
                    <div class="bar-container">
                    <div class="bar-2"></div>
                    </div>
                    </div>
                    <div class="side right">
                    <div>6</div>
                    </div>
                    <div class="side">
                    <div>1 star</div>
                    </div>
                    <div class="middle">
                    <div class="bar-container">
                    <div class="bar-1"></div>
                    </div>
                    </div>
                    <div class="side right">
                    <div>20</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="review-filterSort">
                        <span class="title">Product Reviews</span>
                        <div class="filterSort">
                            <i class="fa fa-sort"></i><span data-spm-anchor-id="a2a0e.pdp.ratings_reviews.i4.321c6d0b3BAEBk">Filter:</span><span class="condition">All star</span>
                        </div>
                        <div class="filterSort">
                            <i class="fa fa-sort"></i><span>Sort:</span>
                            <span class="condition" data-spm-anchor-id="a2a0e.pdp.ratings_reviews.i3.321c6d0b3BAEBk">Relevance</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="review-wrapper">
                        <div class="single-review">
                            <div class="review-img">
                                <img width="50" src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="rating-product">
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star "></i>
                                        </div>
                                    </div>
                                    <div class="review-left">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                By <a href="#">White Lewis</a> | 4 weeks ago
                                <div class="review-bottom">
                                    <p>
                                        Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                    </p>
                                </div>
                            </div>
                        </div>
                       <div class="single-review">
                            <div class="review-img">
                                <img width="50" src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="rating-product">
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star checked"></i>
                                            <i class="fa fa-star "></i>
                                        </div>
                                    </div>
                                    <div class="review-left">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                By <a href="#">White Lewis</a> | 4 weeks ago
                                <div class="review-bottom">
                                    <p>
                                        Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- Recent Add Product Area Start -->
    <section class="recent-add-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>You Might Also Like</h2>
                        <p>Add Related products to weekly line up</p>
                    </div>
                    <!-- Section Title -->
                </div>
            </div>
            <!-- Recent Product slider Start -->
            <div class="recent-product-slider owl-carousel owl-nav-style">
                <!-- Single Item -->
                @foreach($related_products as $related_product)
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.php" class="thumbnail">
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Originals Kaval Windbr...</a></h2>
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
                @endforeach
                <!-- Single Item -->
               
            </div>
            <!-- Recent product slider end -->
        </div>
    </section>
    <!-- Recent product area end -->
    <!-- Recent Add Product Area Start -->
    <section class="recent-add-area mt-30 mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>In The Same Category</h2>
                        <p>16 other products in the same category:</p>
                    </div>
                    <!-- Section Title -->
                </div>
            </div>
            <!-- Recent Product slider Start -->
            <div class="recent-product-slider owl-carousel owl-nav-style">
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.php" class="thumbnail">
                            <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-15.jpg" alt="" />
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Originals Kaval Windbr...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Juicy Couture Juicy Quil...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
                            <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-22.jpg" alt="" />
                            <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-23.jpg" alt="" />
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
                        <a class="inner-link" href="shop-4-column.php"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.php" class="product-link">Brixton Patrol All Terrai...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
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
                        <a class="inner-link" href="shop-4-column.php"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.php" class="product-link">New Balance Arishi Spo...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
                            <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-18.jpg" alt="" />
                            <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-18.jpg" alt="" />
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
                        <a class="inner-link" href="shop-4-column.php"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.php" class="product-link">Calvin Klein Jeans Refle...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
                            <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-7.jpg" alt="" />
                            <img class="second-img" src="{{asset('frontend')}}/images/product-image/organic/product-8.jpg" alt="" />
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Madden by Steve Madd...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Trans-Weight Hooded...</a></h2>
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
                        <a href="single-product.php" class="thumbnail">
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
                        <a class="inner-link" href="shop-4-column.php"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.php" class="product-link">Water and Wind Resist...</a></h2>
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
    <!-- Recent product area end -->

@endsection


@section('js')
<!-- text more & less -->
<script type="text/javascript">
    $(document).ready(function() {
    var showChar = 100;
    var ellipsestext = "...";
    var moretext = "more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>
<!-- text more & less -->
@endsection