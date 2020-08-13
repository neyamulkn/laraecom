<ul>
@if($sessionCart)
    @foreach($sessionCart as $item)
    <li class="single-shopping-cart">
        <div class="shopping-cart-img">
            <a href="single-product.php"><img alt="" src="{{asset('frontend')}}/images/product-image/mini-cart/1.jpg" /></a>
            <span class="product-quantity">{{$item['qty']}}x</span>
        </div>
        <div class="shopping-cart-title">
            <h4><a href="{{ route('product_details', $item['slug']) }}" class="product-link">{{Str::limit($item['title'], 22)}}</a></h4>
            <span>${{$item['price']}}</span>
            <div class="shopping-cart-delete">
                <a href="{{ route('home.category') }}"><i class="ion-android-cancel"></i></a>
            </div>
        </div>
    </li>
    @endforeach
@endif
</ul>

<div class="shopping-cart-btn text-center">
    <a class="default-btn" href="{{ route('checkout') }}">checkout</a>
</div>