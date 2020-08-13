
<article class="list-product">
    <div class="img-block">
        <a href="{{ route('product_details') }}" class="thumbnail">
            <img class="first-img" src="{{asset('frontend')}}/images/product-image/organic/product-1.jpg" alt="" />
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
