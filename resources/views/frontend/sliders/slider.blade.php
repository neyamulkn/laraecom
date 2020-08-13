
<div class="slider-area">
    <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
       
        @foreach($sliders as $slider)
        <!-- Slider Single Item Start -->
        <div class="slider-height-10 d-flex align-items-start justify-content-start bg-img" style="background-image: url({{asset('upload/images/slider/'.$slider->phato)}});">
            <div class="container">
                <div class="slider-content-5 slider-animated-1 text-{{$slider->text_position}}">
                    <p class="animated"><strong style="font-size:{{$slider->title_size}}px; color:{{$slider->title_color}}; font-family: {{$slider->title_style}}"> {{ $slider->title }} </strong></p>
                    <p class="animated" style="font-size:{{$slider->title_size}}px; color:{{$slider->title_color}}; font-family: {{$slider->title_style}}">{{$slider->subtitle}}</p>
                    <a href="{{$slider->btn_link}}" class="shop-btn animated">{{($slider->btn_text) ? $slider->btn_text : 'SHOP NOW'}}</a>
                </div>
            </div>
        </div>
        <!-- Slider Single Item End --> 
        @endforeach
    </div>
</div>
