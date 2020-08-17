@extends('layouts.frontend')
@section('title', 'Cart Item')
@section('css')
    <style type="text/css">
        .cart-table-content table thead>tr th{padding: 8px;}
        .cart-table-content table tbody>tr td{padding: 10px 5px;}
        .cart-table-content table tbody>tr td.product-quantity{width: inherit;}
       .qtybutton{display: none;}
       .qtybtn{display: block !important;}
       .discount-code input {
            width: 195px;
            height: 37px;
            margin: 0px;

            padding: 0px 10px;
            font-size: 14px;
        }
        .discount-code{
            padding: 5px 0; 
            margin: 5px 0; 
            border-bottom: 1px solid #ebebeb;
            border-top: 1px solid #ebebeb;
        }
    </style>
@endsection
@section('content')
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb-links">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area start -->
    <div class=" cart-main-area mtb-20px">
        <div class="container" >
       
            <h3 class="cart-page-title">Your cart items</h3>
            <div id="pageLoading"></div>
            <div id="cart_summary">
                @include('frontend.carts.cart_summary')
            </div>
        </div>
    </div>
    <!-- cart area end -->

@endsection

@section('js')

<script type="text/javascript">
    function cartUpdate(id){
        document.getElementById('pageLoading').style.display = 'block';
        var qty = $('#qtyTotal'+id).val();
        if(parseInt(qty) && qty>0){
            $.ajax({
                url:"{{route('cart.update')}}",
                method:"get",
                data:{ id:id,qty:qty },
                success:function(data){
                    if(data.status == 'error'){
                        toastr.error(data.msg);
                    }else{
                        $('#cart_summary').html(data);
                        toastr.success('Quantity Update Successful');
                    }
                    document.getElementById('pageLoading').style.display = 'none';
                },
                error: function(jqXHR, exception) {
                    toastr.error('Internal server error.');
                    document.getElementById('pageLoading').style.display = 'none';
                }
            });
        }else{
            toastr.error('Invalid Number.');
            document.getElementById('pageLoading').style.display = 'none';
        }
    }    

   $("#couponForm").submit(function(e) {
        e.preventDefault(); 
        var coupon_code = $('#couponCode').val();
       
        document.getElementById('pageLoading').style.display = 'block';
        $.ajax({
            url:"{{route('coupon.apply')}}",
            method:"get",
            data:{ coupon_code:coupon_code },
            success:function(data){
                document.getElementById('pageLoading').style.display = 'none';
                if(data.status == 'error'){
                    $('#grandTotal').html(data.total);
                    toastr.error(data.msg);
                }else{
                    $('#cart_summary').html(data);
                    toastr.success('Coupon code successfully applied. You are available discount..');
                }
               
            },
            error: function(jqXHR, exception) {
                toastr.error('Internal server error.');
                document.getElementById('pageLoading').style.display = 'none';
            }
        });
    });
</script>

@endsection