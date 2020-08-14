<style type="text/css">
    .shop-top-bar {
        padding: 10px 30px;
        margin: 0px -15px 10px -15px;
        border-bottom: 1px solid #e6e6e6;
    }
</style>
<!-- Shop Top Area Start -->
<div class="shop-top-bar">
    <!-- Left Side start -->
    <div class="shop-tab nav mb-res-sm-15">
        
        <a href="#shop-2" data-toggle="tab">
            <i class="fa fa-list-ul"></i>
        </a>
        <p>({{ ($products) ?  $products->total() : '0' }}) products found for {{Request::get('q')}}</p>
    </div>
    <!-- Left Side End -->
    <!-- Right Side Start -->
    <div class="select-shoing-wrap">
        <div class="shot-product">
            <p>Sort By: </p>
        </div>
        <div class="shop-select">
            <select class="nice-select" style="margin-top: 5px;" onchange="sortproduct()" id="sortby">
                <option value="">Sort by newness</option>
                <option @if(Request::get('sortby') == 'asc') selected @endif value="asc">A to Z</option>
                <option @if(Request::get('sortby') == 'desc') selected @endif value="desc"> Z to A</option>
            </select>
        </div>
    </div>
    <!-- Right Side End -->
</div>
<!-- Shop Top Area End -->

<!-- Shop Bottom Area Start -->
<div class="shop-bottom-area mt-35">
    @if($products)
    <div class="row">

        @foreach($products as $product)
        <div style="padding-right: 0px;" class="col-xl-3 col-md-6 col-lg-4 col-sm-6 col-xs-6">
            @include('frontend.products.products')
        </div>
        @endforeach
    </div>
    <!-- Shop Content End -->
    <!--  Pagination Area Start -->
   
    <div class="text-center">
         {{$products->appends(request()->query())->links()}}
    </div>
    <!--  Pagination Area End -->

    @else
    <div style="text-align: center;">
        <h3>Search No Result</h3>
        <p>We're sorry. We cannot find any matches for your search term</p>
        <i style="font-size: 10rem;" class="ion-ios-search-strong"></i>
    </div>
    @endif
</div>
<!-- Shop Bottom Area End -->

