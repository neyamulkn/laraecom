@extends('layouts.frontend')

@section('title', Request::get('q') . ' | '. Config::get('siteSetting.site_name') )
@section('css')
<style type="text/css">
    .page-link{border-radius: 50px;margin-left: 5px !important;}
    .sidebar-widget{border-bottom: 1px solid #e8e6e6;padding-bottom: 8px;}
    #filter_product{background: #f9f9f9; margin-top: -9px;}
</style>
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.range.css') }}">
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb-links">
                            <li><a href="{{url('/')}}">Home</a></li>
                            @if(Request::get('cat'))
                            <li><a href="{{route('home.category', Request::get('cat') )}}">{{ Request::get('cat') }}</a></li>
                            @endif
                            <li>Search Results: {{Request::get('q')}}</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Category Area End -->
    <div class="shop-category-area">
        
        <div class="container">
            
            <div class="row">
                <div id="filter_product" class="col-lg-10 order-lg-last col-md-12 order-md-first" >
                    @include('frontend.products.filter_products')
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-2 order-lg-first col-md-12 order-md-last mb-res-md-60px mb-res-sm-60px">
                    <div class="left-sidebar">
                        <div class="sidebar-heading">
                            <div class="main-heading">
                                <h2>Filter By</h2>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Related Categories</h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        
                                        @if($filterCategories)
                                        @foreach($filterCategories as $filterCategory )
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <a href="#">{{$filterCategory->name}}</a>
                                                
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                        </div>
                        
                        @if(count($brands)>0)
                        <div class="sidebar-widget mt-20">
                            <h4 class="pro-sidebar-title">Brands</h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    @foreach($brands as $brand)
                                    <li>
                                        <div class="">
                                            <input @if(in_array($brand->id , explode(',', Request::get('brand')))) checked @endif class="common_selector brand" value="{{$brand->id}}" id="brand{{$brand->id}}" type="checkbox" />
                                            <label for="brand{{$brand->id}}" >{{ $brand->name }}</label> 
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget mt-20">
                            <h4 class="pro-sidebar-title">Price</h4>
                            
                            <input  type="hidden" id="price-range"  class="price-range-slider tertiary" value="@if(Request::get('price')) {{Request::get('price')}} @else 1000 @endif" form="shop_search_form"><br/>
                            <button id="+'&price='+price" class="btn btn-info btn-sm common_selector">Update your Search</button>
               
                        </div>
                        <!-- Sidebar single item -->
                        @foreach($specifications as $specification)
                        <!-- check weather value set or not -->
                        @if(count($specification->get_attrValues)>0)
                        <div class="sidebar-widget mt-20">
                            <h4 class="pro-sidebar-title">{{$specification->name}}</h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    @foreach($specification->get_attrValues as $attrValue)
                                    <li>
                                        <div class="">
                                            <input @if(in_array($attrValue->id , explode(',', Request::get(strtolower($specification->name)))) ) checked @endif value="{{$attrValue->id}}" class=" {{$specification->name}} common_selector" id="attr{{$attrValue->id}}" type="checkbox" />
                                            <label for="attr{{$attrValue->id}}" >{{ $attrValue->name }}</label> 
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <div class="sidebar-widget mt-30">
                            <h4 class="pro-sidebar-title">Ratting</h4>
                            <div class="sidebar-widget-list">
                                <ul class="review-wrapper rating-product">
                                    @for($r=5; $r>=1; $r--)
                                    <li>
                                        <input @if(Request::get('ratting') == $r) checked @endif class="common_selector ratting" type="radio" name="ratting" id="ratting{{$r}}" value="{{$r}}">
                                        <label for="ratting{{$r}}">
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star {{($r>=2) ? 'checked' : '' }} "></i>
                                        <i class="fa fa-star {{($r>=3) ? 'checked' : '' }} "></i>
                                        <i class="fa fa-star {{($r>=4) ? 'checked' : '' }} "></i>
                                        <i class="fa fa-star {{($r>=5) ? 'checked' : '' }} "></i>
                                        </label>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="{{ asset('frontend/js/jquery.range.min.js') }}"></script>

<script type="text/javascript">
    (function($) {
        /*-----------
            RANGE
        -----------*/
        $('.price-range-slider').jRange({
            from: 0,
            to: 1000,
            step: 1,
            format: '$%s',
            width: 190,
            showLabels: true,
            showScale: false,
            isRange : true,
            theme: "theme-edragon"
        });
    })(jQuery);
    

    function filter_data(page)
    {
       
        
        var concatUrl = '';
        var category = "{{ (Request::get('cat')) ? 'cat='.Request::get('cat') : '' }}";
        
        var searchKey = $("#searchKey").val();
        if(searchKey != '' ){
            concatUrl += '&q='+searchKey;
        }


        @foreach($specifications as $specification)
            var filterValue = get_filter('{{$specification->name}}');
            if(filterValue != ''){
                concatUrl += '&{{strtolower($specification->name)}}='+filterValue;
            }
            
        @endforeach
       
        var brand = get_filter('brand');
        if(brand != '' ){
            concatUrl += '&brand='+brand;
        }        

        var ratting = get_filter('ratting');
        if(ratting != '' ){
            concatUrl += '&ratting='+ratting;
        }

        
        var sortby = $("#sortby :selected").val();
        if(sortby != '' && sortby != null){
            concatUrl += '&sortby='+sortby;
        }

        var price = document.getElementById('price-range').value;
        if(price != '' ){
            concatUrl += '&price='+price;
        }
       
        if(page != null){concatUrl += '&page='+page;}
       
         //enable loader
        $('#filter_product').html('<div class="loadingData"></div>');
        

        var  link = '{{route("product.search")}}?'+category+concatUrl;
            history.pushState({id: 'category'}, category, link);

        $.ajax({
            url:link,
            method:"get",
            data:{
                filter:'filter'
            },
            success:function(data){
                if(data){
                    $('#filter_product').html(data);
               }else{
                    $('#filter_product').html('Not Found');
               }
            },
            // $ID Error display id name
            @include('common.ajaxError', ['ID' => 'filter_product'])

        });
    }

    function get_filter(class_name)
    {

        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
       
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    function sortproduct(){
        filter_data();
    }

    function searchItem(value){
        if(value != ''){ filter_data(); }
    }


    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        filter_data(page);
    });


</script>
@endsection