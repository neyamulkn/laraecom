<!-- Shop Top Area Start -->
<div class="shop-top-bar">
    <!-- Left Side start -->
    <div class="shop-tab nav mb-res-sm-15">
        
        <a href="#shop-2" data-toggle="tab">
            <i class="fa fa-list-ul"></i>
        </a>
        <p>({{$products->total()}}) products found in {{$category->name}}</p>
    </div>
    <!-- Left Side End -->
    <!-- Right Side Start -->
    <div class="select-shoing-wrap">
        <div class="shot-product">
            <p>Sort By:</p>
        </div>
        <div class="shop-select">
            <select>
                <option value="">Sort by newness</option>
                <option value="">A to Z</option>
                <option value=""> Z to A</option>
                <option value="">In stock</option>
            </select>
        </div>
    </div>
    <!-- Right Side End -->
</div>
<!-- Shop Top Area End -->

<!-- Shop Bottom Area Start -->
<div class="shop-bottom-area mt-35">
    <!-- Shop Tab Content Start -->
    <div class="tab-content jump">
        <!-- Tab One Start -->
        <div class="tab-pane active">
            <div class="row">

                @foreach($products as $product)
                <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6 col-xs-12">
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
                            
                            <h2><a href="{{ route('product_details', $product->slug) }}" class="product-link">{{Str::limit($product->title, 22)}}</a></h2>
                            <div class="rating-product">
                                @for($i=1; $i<=5; $i++)
                                    <i class="ion-android-star"></i>
                                @endfor
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                @if($product->discount)
                                    <li class="old-price"> {{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</li>
                                    <li class="current-price">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</li>
                                    <li class="discount-price">-{{$product->discount}}%</li>
                                @else
                                    <li class="old-price not-cut">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class="add-to-link">
                            <ul>
                                <li class="cart"><button onclick="addToCart({{$product->id}})" class="cart-btn">ADD TO CART </button></li>
                                <li>
                                    <a href="wishlist.php"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                                <li>
                                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i></a>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Tab One End -->
        
    </div>
    <!-- Shop Tab Content End -->
    <!--  Pagination Area Start -->
   
    <div class="text-center">
        {{$products->links()}}
    </div>
    <!--  Pagination Area End -->
</div>
<!-- Shop Bottom Area End -->

