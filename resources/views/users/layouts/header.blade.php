<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        {{-- <div class="top_bar_icon"><img
                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png"
                                alt=""></div>+91 9539406750 --}}
                    </div>
                    <div class="top_bar_contact_item">
                        {{-- <div class="top_bar_icon"><img
                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png"
                                alt=""></div><a href="mailto:fastsales@gmail.com">shamseertt29@gmail.com</a> --}}
                    </div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_user">
                            <div class="user_icon"><img
                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg"
                                    alt=""></div>
                                    @if (auth()->guard('customer')->user())
                                    <div><a href="">{{ auth()->guard('customer')->user()->customer_name}}</a></div>
                                    <div><a href="{{route('logout_customer')}}"><i class="fa fa-power-off"></i> Logout</a></div>
                                    @else
                                    <div><a style="cursor: pointer" onclick="clickAuth(1)">Register</a></div>
                                    <div><a style="cursor: pointer" onclick="clickAuth(2)">Sign in</a></div>
                                    @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{route('home')}}">BERU</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="" class="header_search_form clearfix" id="filter-form" method="GET">
                                    <input type="search" class="header_search_input"
                                        placeholder="Search for products..." name="search" value="{{ Request::get('search') }}">
                                    <div class="custom_dropdown">
                                        <input type="hidden" name="dorop_down_list" id="dorop_down_list" value="{{ Request::get('dorop_down_list') }}">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">@if (Request::get('dorop_down_list') != '')
                                                @if (Request::get('dorop_down_list') == 0)
                                                All Categories
                                                @else
                                                    @if ($categories)
                                                        @foreach ($categories as $val)
                                                            @if ($val->id == Request::get('dorop_down_list'))
                                                                {{ $val->name }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @else
                                            All Categories
                                            @endif</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                <li onclick="addtoInput(0)"><a class="clc" href="#">All Categories</a></li>
                                                @if($categories)
                                                    @foreach($categories as $item)
                                                        <li onclick="addtoInput({{ $item->id }})"><a href="" class="clc">{{ $item->name}}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300"
                                        value="Submit"><img
                                            src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"
                                            alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img
                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png"
                                    alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="{{route('wishlist')}}">Wishlist</a></div>
                                <div class="wishlist_count">{{ $wishlistcounts }}</div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"
                                        alt="">
                                    <div class="cart_count"><span>{{ $cartitemscounts }}</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="{{ route('cart') }}">Cart</a></div>
                                    <div class="cart_price">₹ {{ $cartcoasts }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->


    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input"
                                    placeholder="Search for products...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">

                            <li class="page_menu_item">
                                <a href="#">Home<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item"><a href="blog.html">blog<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item"><a href="contact.html">contact<i
                                        class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>
                                +38 068 005 3570
                            </div>
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a
                                    href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
