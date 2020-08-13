<link rel="stylesheet" href="{{ mix('frontend/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
<style type="text/css">
.loadingData
    {
        z-index: 9999; 
        width: 100%;
        color: red;
        text-align: center;
        height: 80px;
        background: url('{{ asset("assets/images/loading.gif")}}') no-repeat center; 
    }
    .loadingData-sm
    {
        z-index: 9999; 
        width: 100%;
        height: 20px;
        background: url('{{ asset("assets/images/loader.gif")}}') no-repeat center; 
    }
</style>
@yield('css')