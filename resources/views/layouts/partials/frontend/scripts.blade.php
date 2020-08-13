    <script src="{{ mix('frontend/js/app.js') }}"></script>
   
    <script src="{{ mix('js/laravel-echo.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('frontend/js/typeahead.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#searchKey').typeahead({

                source: function (query, result) {
                    $.ajax({
                        url: '{{ route("search_keyword") }}',
                        data: 'q=' + query,            
                        dataType: "json",
                        type: "get",
                        success: function (data) {
                            result($.map(data, function (item) {
                                return item;
                            }));
                        }
                    });
                }
            });
        });
    </script>
    @yield('js')

    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
<!--     <script>
        
        Echo.channel('postBroadcast')
        .listen('PostCreated', (e) => {
            toastr.info(e.post['title']);
        });
    </script> -->


<script type="text/javascript">
    
    function addToCart(product_id){
       
        $.ajax({
            method:'post',
            url:"{{route('cart.add')}}",
            data:{
                product_id:product_id,
                _token:"{{ csrf_token() }}"
            },
            success:function(data){
               
                if(data.status == 'success'){
                    toastr.success(data.msg);
                    $('#cartCount').html(Number($('#cartCount').html())+1);
                }else{
                    toastr.error(data.msg);
                }
            }
        });
    }    

    function getCart(){

        $.ajax({
            method:'post',
            url:"{{route('getCartHead')}}",
            data:{
                _token:"{{ csrf_token() }}"
            },
            success:function(data){
               
                if(data){
                    $('#getCartHead').html(data);
                    $('#getCartHeadMobile').html(data);
                }else{
                    toastr.error('Your cart is empty.');
                }
            }
        });
    }
</script>
