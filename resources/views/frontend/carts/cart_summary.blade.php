@if($cartItems)
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">

                            <table style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $total = 0; ?>
                                    @foreach($cartItems as $item)
                                    <?php $total += $item['price']*$item['qty']; ?>
                                    <tr id='carItem{{$item["product_id"]}}'>
                                        <td>
                                            <img width="50" src="{{asset('upload/images/product/thumb/'.$item['image'])}}">
                                        </td>
                                        <td style="text-align: left;"><a href="{{route('product_details', $item['slug'])}}">{{$item['title']}}</a>
                                        </td>
                                        <td >{{$site['currency_symble']}}<span class="amount">{{$item['price']}}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                               
                                                <input id="qtyTotal{{$item["product_id"]}}" onchange="cartUpdate({{$item["product_id"]}})" class="cart-plus-minus-box" min="1" type="number" min='1' name="qtybutton" value="{{$item['qty']}}">
                                                
                                            </div>
                                        </td>
                                        <td>{{$site['currency_symble']}}<span id="subtotal{{$item["product_id"]}}">{{$item['price']*$item['qty']}}</span></td>
                                        <td class="product-remove">
                                            
                                            <a data-target="#delete" data-toggle="modal" onclick='cartDelete("{{route("cart.itemRemove", $item["product_id"])}}")' href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                
                                    <div style="float: left;margin: 10px 0;" class="cart-shiping-update">
                                         <a class="btn btn-info btn-sm" href="{{url('/')}}">Continue Shopping</a>
                                    </div>
                                    <div style="float: right;margin: 10px 0;" class="cart-clear">
                                        <a onclick="return confirm('Are You Sure Clear All Cart Items.?')" class="btn btn-danger btn-sm" href="{{route('cart.clear')}}">Clear Cart</a>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4">
                                                                           
                        <div class="grand-totall" style="padding: 10px 20px">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Subtotal <span>{{$site['currency_symble']}}<span id="cartTotal">{{$total}}</span></span></h5>

                            <h5>Shipping Fee <span>{{$site['currency_symble']}}0</span></h5>
                            @if(Session::get('couponAmount'))
                            <h5>Coupon Discount <span>{{$site['currency_symble']}}{{Session::get('couponAmount')}}</span></h5>
                            @endif
                            <div class="discount-code">
                                <form id="couponForm" method="get">
                                    <i>Enter your coupon code if you have one.</i>
                                    
                                    <input placeholder="Enter coupon" id="couponCode" type="text" required="" name="coupon_code">
                                    <button id="couponBtn" style="width: 100px" class="btn btn-info" type="submit">Apply</button>
                                </form>
                            </div>
                            
                            <h4 class="grand-totall-title">Grand Total <span>{{$site['currency_symble']}}<span  id="grandTotal">{{$total - (Session::get('couponAmount') ? Session::get('couponAmount') : 0)}}</span></span></h4>
                            <a id="checkout" href="/">Proceed to Checkout</a>
                        </div>
                   
                    </div>
                </div>
            @else
                <div style="text-align: center;">
                    <i style="font-size: 80px;" class="fa fa-shopping-cart"></i>
                    <h1>Your cart is empty.</h1>
                    <p>Looks line you have no items in your shopping cart.</p>
                    Click here <a href="{{url('/')}}">Continue Shopping</a>
                </div>
            @endif