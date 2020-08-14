<div @if(count($sessionCart)>7) style="height: 400px;overflow-y: scroll;" @endif >
    <ul>
    @if($sessionCart)
        @foreach($sessionCart as $item)
        <li class="single-shopping-cart">
            <div class="shopping-cart-img">
                <a href="single-product.php"><img alt="" src="{{asset('upload/images/product/'.$item['image'])}}" /></a>
                <span class="product-quantity">{{$item['qty']}}x</span>
            </div>
            <div class="shopping-cart-title">
                <h4><a href="{{ route('product_details', $item['slug']) }}" class="product-link">{{Str::limit($item['title'], 22)}}</a></h4>
                <span>${{$item['price']}}</span>
                <div class="shopping-cart-delete">
                    <a type="button" onclick="cartRemove({{$item['product_id']}})"><i class="ion-android-cancel"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    @endif

    </ul>
</div>
<div class="">
    <a style="width: 45%" class="btn btn-danger btn-sm" href="{{ route('cart') }}">Veiw Cart</a>
    <a style="width: 50%" class="btn btn-info btn-sm" href="{{ route('checkout') }}">checkout</a>
    
</div>