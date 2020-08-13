<style type="text/css">
    .cartCount{
    color: #fff;
    font-size: 13px;
    position: absolute;
    right: auto;
    left: 15px;
    background: #f36e36;
    top: 9px;
    width: 18px;
    height: 18px;
    line-height: 19px;
    text-align: center;
    border-radius: 50%;
}
</style>
<header class="main-header">
    <!-- Header Top Start -->
    <div class="header-top-nav ">
        <div class="container">
            <div class="row">
                <!--Left Start-->
                <div class="col-6 col-lg-4 col-md-4">
                    <div class="left-text">
                        <p>Welcome you to website!</p>
                    </div>
                </div>
                <!--Left End-->
                <!--Right Start-->
                <div class="col-6 col-lg-8 col-md-8 text-right">
                    <div class="header-right-nav">
                        <div class="dropdown-navs">
                            <ul>
                                <!-- Settings Start -->
                                <li class="dropdown after-n">
                                    <a class="angle-icon" href="#"><i class="far fa-user"></i> My Account</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{route('my_account')}}">My Account</a></li>
                                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    </ul>
                                </li>
                                <!-- Settings End -->

                                <!-- Language Start -->
                                <li class="top-10px mr-15px">
                                    <select style="display: none;">
                                        <option value="1">English</option>
                                        <option value="2">Bangla</option>
                                    </select>
                                </li>
                                <!-- Language End -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Right End-->
            </div>
        </div>
    </div>
    <!-- Header Top End -->
    <!-- Header Buttom Start -->
    <div class="header-navigation d-lg-block d-none">
        <div class="container">
            <div class="row">
                <!-- Logo Start -->
                <div class="col-md-3 col-sm-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img width="175" src="{{asset('frontend')}}/images/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <!-- Logo End -->
                <div class="col-md-9 col-sm-10">
                    <!--Header Bottom Account Start -->
                    <div class="header_account_area">
                        <!--Seach Area Start -->
                        <div class="header_account_list search_list">
                            <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                            <div class="dropdown_search">
                                <form action="{{ route('home.category') }}">
                                    <input id="searchKey" required placeholder="Search entire store here ..." type="text" />
                                    <div class="search-category">
                                        <?php $categories =  \App\Models\Category::where('parent_id', '=', null)->where('status', 1)->get() ?>
                                        <select style="border: none;display: none;" class="bootstrap-select" name="poscats">
                                            <option value="0">All categories</option>
                                            @foreach($categories as $srccategory)
                                            <option value="{{$srccategory->slug}}">{{$srccategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--Seach Area End -->
                        <!--Contact info Start -->
                        <div class="contact-link-wrap">
                            <div class="contact-link">
                                <div class="phone">
                                    <p>Call us:</p>
                                    <a href="tel:(+800)345678">(+800)345678</a>
                                </div>
                            </div>
                            <!--Contact info End -->
                            <!--Cart info Start -->
                            <div class="cart-info d-flex">
                                
                                <a href="{{ route('wishlist') }}" class="count-cart heart"><span class="cartCount" id="wishlist">4</span></a>
                                <?php 
                                $getCart = $sessionCart = 0;
                                if(Session::get('cart')){ $sessionCart = count(Session::get('cart')); }
                                if(Auth::check()){ $getCart = App\Models\Cart::where('user_id', Auth::id())->count(); } 
                                ?>
                                
                                <div class="mini-cart-warp">
                                    <a onclick="getCart()" href="#" class="count-cart"><span class="cartCount" id="cartCount">{{$sessionCart+$getCart}}</span></a>
                                    <!-- //show cart content -->
                                    <div id="getCartHead" class="mini-cart-content"><div class="loadingData-sm"></div></div>
                                </div>
                            </div>
                            <!--Cart info End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header Bottom Account End -->
    <!-- Menu Content Start -->
    <div class="header-buttom-nav sticky-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left d-none d-lg-block">
                    <div class="d-flex align-items-start justify-content-start">
                        <!-- Beauty Category -->
                        <div class="beauty-category vertical-menu home-9">
                            <h3 class="vertical-menu-heading vertical-menu-toggle">All Categories</h3>
                            <ul class="vertical-menu-wrap open-menu-toggle">
                                <?php $catHidden = 1; $totalCat = 10 ?>
                                @foreach($categories as $category)
                                   
                            
                                    @if(count($category->get_subcategory)>0)
                                        <li class="menu-dropdown {{($catHidden>$totalCat ? 'hidden' : '')}} ">
                                            <a href="{{ route('home.category', $category->slug) }}">{{$category->name}}<i class="ion-ios-arrow-down"></i></a>
                                            
                                            <ul class="mega-menu-wrap">
                                                @foreach($category->get_subcategory as $subcategory)
                                                <li>
                                                    <ul class="mb-20px">
                                                        <li class="mega-menu-title"><a href="{{ route('home.category', [$category->slug, $subcategory->slug]) }}">{{$subcategory->name}}</a></li>
                                                        @foreach($subcategory->get_subcategory as $childcategory)
                                                            <li><a href="{{ route('home.category',[ $category->slug, $subcategory->slug, $childcategory->slug]) }}">{{$childcategory->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="{{($catHidden>$totalCat ? 'hidden' : '')}}"><a href="{{ route('home.category') }}">{{$category->name}}</a></li>
                                    @endif
                                    <?php $catHidden++; ?>
                                    
                                @endforeach
                                <li>
                                    <a href="#" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More Categories</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Beauty Category -->
                        <!--Main Navigation Start -->
                        <div class="main-navigation d-none d-lg-block">
                            <ul>

                                <li><a href="about.php">About Us</a></li>
                                 <li><a href="{{ route('home.category') }}">Shop</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="{{ route('home.category') }}">Customer Service</a></li>
                                <li><a href="{{ route('home.category') }}">Track Order</a></li>

                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                        <!--Main Navigation End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Content End -->
    <!-- Header Buttom Start -->
    <div class="header-navigation sticky-nav d-lg-none">
        <div class="container position-relative">
            <div class="row">
                <!-- Logo Start -->
                <div class="col-md-2 col-sm-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{asset('frontend')}}/images/logo/logo.png" width="130" alt="" /></a>
                    </div>
                </div>
                <!-- Logo End -->
                <!-- Navigation Start -->
                <div class="col-md-10 col-sm-10">
                    <!--Header Bottom Account Start -->
                    <div class="header_account_area">
                        <!--Seach Area Start -->
                        <div class="header_account_list search_list">
                            <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                            <div class="dropdown_search">
                                <form action="#">
                                    <input placeholder="Search entire store here ..." type="text" />
                                    <div class="search-category">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="0">All categories</option>
                                            <option value="68">
                                                Electronics
                                            </option>
                                            <option value="69">
                                                - - Accessories &amp; Parts
                                            </option>
                                            <option value="75">
                                                - - - - Cables &amp; Adapters
                                            </option>
                                            <option value="76">
                                                - - - - Batteries
                                            </option>
                                            <option value="77">
                                                - - - - Chargers
                                            </option>
                                            <option value="78">
                                                - - - - Bags &amp; Cases
                                            </option>
                                            <option value="79">
                                                - - - - Electronic Cigarettes
                                            </option>
                                            <option value="70">
                                                - - Audio &amp; Video
                                            </option>
                                            <option value="80">
                                                - - - - Televisions
                                            </option>
                                            <option value="81">
                                                - - - - TV Receivers
                                            </option>
                                            <option value="82">
                                                - - - - Projectors
                                            </option>
                                            <option value="83">
                                                - - - - Audio Amplifier Boards
                                            </option>
                                            <option value="84">
                                                - - - - TV Sticks
                                            </option>
                                            <option value="71">
                                                - - Camera &amp; Photo
                                            </option>
                                            <option value="85">
                                                - - - - Digital Cameras
                                            </option>
                                            <option value="86">
                                                - - - - Camcorders
                                            </option>
                                            <option value="87">
                                                - - - - Camera Drones
                                            </option>
                                            <option value="88">
                                                - - - - Action Cameras
                                            </option>
                                            <option value="89">
                                                - - - - Photo Studio Supplies
                                            </option>
                                            <option value="72">
                                                - - Portable Audio &amp; Video
                                            </option>
                                            <option value="90">
                                                - - - - Headphones
                                            </option>
                                            <option value="91">
                                                - - - - Speakers
                                            </option>
                                            <option value="92">
                                                - - - - MP3 Players
                                            </option>
                                            <option value="93">
                                                - - - - VR/AR Devices
                                            </option>
                                            <option value="94">
                                                - - - - Microphones
                                            </option>
                                            <option value="73">
                                                - - Smart Electronics
                                            </option>
                                            <option value="95">
                                                - - - - Wearable Devices
                                            </option>
                                            <option value="96">
                                                - - - - Smart Home Appliances
                                            </option>
                                            <option value="97">
                                                - - - - Smart Remote Controls
                                            </option>
                                            <option value="98">
                                                - - - - Smart Watches
                                            </option>
                                            <option value="99">
                                                - - - - Smart Wristbands
                                            </option>
                                            <option value="74">
                                                - - Video Games
                                            </option>
                                            <option value="100">
                                                - - - - Handheld Game Players
                                            </option>
                                            <option value="101">
                                                - - - - Game Controllers
                                            </option>
                                            <option value="102">
                                                - - - - Joysticks
                                            </option>
                                            <option value="103">
                                                - - - - Stickers
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--Seach Area End -->
                        <!--Contact info Start -->
                        <div class="contact-link">
                            <div class="phone">
                                <p>Call us:</p>
                                <a href="tel:(+800)345678">(+800)345678</a>
                            </div>
                        </div>
                        <!--Contact info End -->
                        <!--Cart info Start -->
                        <div class="cart-info d-flex">
                            <a href="{{ route('wishlist') }}" class="count-cart random d-xs-none"></a>
                            <a href="{{ route('wishlist') }}" class="count-cart heart d-xs-none"></a>
                            <div class="mini-cart-warp">
                                <a onclick="getCart()" href="#" class="count-cart"><span class="cartCount" id="cartCount">{{$sessionCart+$getCart}}</span></a>
                                <div id="getCartHeadMobile" class="mini-cart-content"></div>
                            </div>
                        </div>
                    </div>
                    <!--Cart info End -->
                </div>
            </div>
            <!-- mobile menu -->
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">

                            <li><a href="#">About Us</a></li>
                            <li><a href="{{ route('home.category') }}">Shop</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="{{ route('home.category') }}">Customer Service</a></li>
                            <li><a href="{{ route('home.category') }}">Track Order</a></li>

                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="{{route('register')}}">Register</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- mobile menu end-->
        </div>
    </div>
    <!--Header Bottom Account End -->
    <!-- Beauty Category -->
    <div class="container d-lg-none">
        <!--=======  category menu  =======-->
        <div class="hero-side-category">
            <!-- Category Toggle Wrap -->
            <div class="category-toggle-wrap">
                <!-- Category Toggle -->
                <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
            </div>

            <!-- Category Menu -->
            <nav class="category-menu">
                <ul>
                    <li class="menu-item-has-children menu-item-has-children-1">
                        <a href="{{ route('home.category') }}">Accessories & Parts<i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-1">
                            <li><a href="{{ route('home.category') }}">Cables & Adapters</a></li>
                            <li><a href="{{ route('home.category') }}">Batteries</a></li>
                            <li><a href="{{ route('home.category') }}">Chargers</a></li>
                            <li><a href="{{ route('home.category') }}">Bags & Cases</a></li>
                            <li><a href="{{ route('home.category') }}">Electronic Cigarettes</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children menu-item-has-children-2">
                        <a href="{{ route('home.category') }}">Camera & Photo<i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-2">
                            <li><a href="{{ route('home.category') }}">Digital Cameras</a></li>
                            <li><a href="{{ route('home.category') }}">Camcorders</a></li>
                            <li><a href="{{ route('home.category') }}">Camera Drones</a></li>
                            <li><a href="{{ route('home.category') }}">Action Cameras</a></li>
                            <li><a href="{{ route('home.category') }}">Photo Studio Supplies</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children menu-item-has-children-3">
                        <a href="{{ route('home.category') }}">Smart Electronics <i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-3">
                            <li><a href="{{ route('home.category') }}">Wearable Devices</a></li>
                            <li><a href="{{ route('home.category') }}">Smart Home Appliances</a></li>
                            <li><a href="{{ route('home.category') }}">Smart Remote Controls</a></li>
                            <li><a href="{{ route('home.category') }}">Smart Watches</a></li>
                            <li><a href="{{ route('home.category') }}">Smart Wristbands</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children menu-item-has-children-4">
                        <a href="{{ route('home.category') }}">Audio & Video <i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-4">
                            <li><a href="{{ route('home.category') }}">Televisions</a></li>
                            <li><a href="{{ route('home.category') }}">TV Receivers</a></li>
                            <li><a href="{{ route('home.category') }}">Projectors</a></li>
                            <li><a href="{{ route('home.category') }}">Audio Amplifier Boards</a></li>
                            <li><a href="{{ route('home.category') }}">TV Sticks</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children menu-item-has-children-5">
                        <a href="{{ route('home.category') }}">Portable Audio & Video <i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-5">
                            <li><a href="{{ route('home.category') }}">Headphones</a></li>
                            <li><a href="{{ route('home.category') }}">Speakers</a></li>
                            <li><a href="{{ route('home.category') }}">MP3 Players</a></li>
                            <li><a href="{{ route('home.category') }}">VR/AR Devices</a></li>
                            <li><a href="{{ route('home.category') }}">Microphones</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children menu-item-has-children-6">
                        <a href="{{ route('home.category') }}">Video Game <i class="ion-ios-arrow-down"></i></a>
                        <!-- category submenu -->
                        <ul class="category-mega-menu category-mega-menu-6">
                            <li><a href="{{ route('home.category') }}">Handheld Game Players</a></li>
                            <li><a href="{{ route('home.category') }}">Game Controllers</a></li>
                            <li><a href="{{ route('home.category') }}">Joysticks</a></li>
                            <li><a href="{{ route('home.category') }}">Stickers</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('home.category') }}">Televisions</a></li>
                    <li><a href="{{ route('home.category') }}">Digital Cameras</a></li>
                    <li><a href="{{ route('home.category') }}">Headphones</a></li>
                    <li><a href="{{ route('home.category') }}">Wearable Devices</a></li>
                    <li><a href="{{ route('home.category') }}">Smart Watches</a></li>
                    <li><a href="{{ route('home.category') }}">Game Controllers</a></li>
                    <li><a href="{{ route('home.category') }}"> Smart Home Appliances</a></li>
                    <li class="hidden"><a href="{{ route('home.category') }}">Projectors</a></li>
                    <li>
                        <a href="{{ route('home.category') }}" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More Categories</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!--=======  End of category menu =======-->
    </div>
    <!-- Beauty Category -->
</header>
