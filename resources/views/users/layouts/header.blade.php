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
                                    @if (auth()->guard('admin')->user())
                                    <div><a href="">{{ auth()->guard('admin')->user()->name}}</a></div>
                                    <div><a href="{{route('logout_customer')}}"><i class="fa fa-power-off"></i> Logout</a></div>
                                    @else
                                    <div><a href="#">Register</a></div>
                                    <div><a href="#">Sign in</a></div>
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
                        <div class="logo"><a href="#">BERU</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="#" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input"
                                        placeholder="Search for products...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                <li><a class="clc" href="#">All Categories</a></li>
                                                @if ($categories)
                                                    @foreach ($categories as $item)
                                                        <li><a href="" class="clc">{{ $item->name}}</a></li>
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
                                <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                <div class="wishlist_count">@if ($wishlist)
                                    {{$wishlist}}
                                @else
                                    0
                                @endif</div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"
                                        alt="">
                                    <div class="cart_count"><span>3</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="#">Cart</a></div>
                                    <div class="cart_price">$185</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->



                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>

                                {{-- <li class="hassubs">
                                    <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="product.html">Product<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog_single.html">Blog Post<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="regular.html">Regular Post<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="contact.html">Contact<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner">
                                        <span></span><span></span><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

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
