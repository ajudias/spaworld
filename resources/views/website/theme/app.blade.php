<!DOCTYPE html>

<html lang="en">

<!-- head -->

<!-- head -->

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('meta-data')


    <link rel="icon" href="{{ url('img/cropped-fav-32x32.png') }}" sizes="32x32" />

    <link rel="icon" href="{{ url('img/cropped-fav-192x192.png') }}" sizes="192x192" />

    <link rel="apple-touch-icon-precomposed" href="{{ url('img/cropped-fav-180x180.png') }}" />

    <!-- Library CSS -->

    <link href="{{ url('css/lecker_library.css') }}" rel="stylesheet">

    <!-- Icons CSS -->

    <link href="{{ url('fonts/themify-icons.css')}}" rel="stylesheet">

    <link href="{{ url('fonts/selima/stylesheet.css') }}" rel="stylesheet">

    <!-- Theme CSS -->

    <link href="{{ url('css/lecker_style.css') }}" rel="stylesheet">

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Lato" rel="stylesheet">

    <link href="{{ url('css/aos.css') }}" rel="stylesheet">

    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">

    <link href="{{ url('css/sub_style.css') }}" rel="stylesheet">

    <style>
    @media (max-width:575px) {}




    @media (min-width:576px) and (max-width:767px) {}


    @media (min-width:768px) and (max-width:991px) {}



    @media (min-width:992px) and (max-width:1199px) {
        .dropdown_ka {
            position: relative;
            display: inline-block;
        }

        .dropdown-content_ka {
            display: none;
            position: absolute;
            background-color: #024055b5;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            padding: 12px 2px;
            z-index: 1;
            text-align: left;
        }

        .dropdown_ka:hover .dropdown-content_ka {
            display: block;
        }
    }

    @media (min-width:1200px) {
        .dropdown_ka {
            position: relative;
            display: inline-block;
        }

        .dropdown-content_ka {
            display: none;
            position: absolute;
            background-color: #024055b5;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            padding: 12px 2px;
            z-index: 1;
            text-align: left;
        }

        .dropdown_ka:hover .dropdown-content_ka {
            display: block;
        }
    }
    </style>


    @yield('mystyles')



    @yield('google-analytics')

</head>

<!-- head -->

<!-- To Top -->

<a href="#lec_page" class="lec_top lec_go"><b class="ti ti-angle-up"></b></a>

<!-- Header -->

<header class="white">

    <div class="container">

        <!-- Logo -->

        <a href="{{config('app.url')}}" class="lec_logo">

            <span style="-webkit-transition-delay: 0.1s;

            -o-transition-delay: 0.1s;

            transition-delay: 0.1s;">S</span>

            <span style="-webkit-transition-delay: 0.2s;

            -o-transition-delay: 0.2s;

            transition-delay: 0.2s;">P</span>

            <span style="-webkit-transition-delay: 0.4s;

            -o-transition-delay: 0.4s;

            transition-delay: 0.4s;margin-left: -1px;">A</span>

            <span class="world" style="-webkit-transition-delay: 0.5s;

            -o-transition-delay: 0.5s;

            transition-delay: 0.5s;">WORLD</span>

            <i><span>Hotel & Spa</span><span>Supplier</span></i></a>

        <!-- Menu -->

        <div class="lec_main_menu">

            <div class="lec_main_menu_icon">

                <i></i><i></i><i></i><i></i>

                <b>Menu</b>

                <b class="lec_main_menu_icon_b">Back</b>

            </div>

        </div>

        <!-- Menu Content -->

        <div class="lec_main_menu_content lec_image_bck" data-color="rgba(0,0,0,0.9)"
            data-image="{{ url('img/sidebarbg.jpg') }}">

            <!-- Over -->

            <div class="lec_over" data-color="#013780" data-opacity="0.6"></div>

        </div>



        <div class="lec_main_menu_content_menu lec_wht_txt text-right">
            <div class="container">
                <ul>
                    <li class="lec_parentt"><a href="{{config('app.url')}}">Home</a>
                    </li>
                    <li class="lec_parentt"><a href="{{config('app.url')}}/about">About</a>
                    </li>

                    {{-- 
                  <li class="lec_parent">
                        <a href="#" class="active">Products</a>
                        <ul>
                          <li class="lec_parents">

                                <!--<a href="#">Spa- 01</a>-->
                                    @yield("product_menu")
                                  
                              <!-- <ul class="sub_ul">
                                 <li>
                                    <a href="{{config('app.url')}}/category/spa-accessories">Recreation-1</a>
                                  </li>
                                  <li >
                                   <a href="{{config('app.url')}}/category/spa-accessories">Recreation-2</a>
                                  </li>
                                  <li>
                                    <a href="{{config('app.url')}}/category/spa-accessories">Recreation-3</a>
                                  </li>
                              </ul>    -->
                           </li>
                        </ul>
                  </li> --}}


                    <!-- <li class="lec_parent">
                        <a href="#" class="active">Products</a>

                        @isset($categoriess)
                        <ul>
                            @foreach ($categoriess as $category)
                            <li class="lec_parents">
                                <a href="#">{{ $category->catg_name }}</a>
                                <ul class="sub_ul">
                                    @forelse ($category->sub_category as $item)
                                    <li>
                                        <a
                                            href="{{route('showproductcatg',$item->url_slug)}}">{{ $item->sub_catg_name}}</a>
                                    </li>
                                    @empty
                                    <li>
                                        <a
                                            href="{{config('app.url')}}/category/spa-accessories">{{ $item->sub_catg_name}}</a>
                                    </li>
                                    @endforelse
                                </ul>
                                @endforeach
                            </li>

                        </ul>
                        @endisset

                    </li> -->



                    <li class="lec_parent ">
                        <a href="#" class="active">Products</a>

                        @isset($categoriess)
                        <ul>
                            @foreach ($categoriess as $category)
                            <li class="lec_parents dropdown_ka">
                                <a href="#">{{ $category->catg_name }}</a>
                                <span class="sub_ul dropdown-content_ka">
                                    @forelse ($category->sub_category as $item)

                                    <a href="{{route('showproductcatg',$item->url_slug)}}">{{ $item->sub_catg_name}}</a>

                                    @empty

                                    <a
                                        href="{{config('app.url')}}/category/spa-accessories">{{ $item->sub_catg_name}}</a>

                                    @endforelse
                                </span>
                                @endforeach
                            </li>

                        </ul>
                        @endisset

                    </li>


                    {{-- <li class="lec_parents">

                               <a href="#">Spa- 02</a>
                               
                               <ul class="sub_ul">
                               <li>
                               <a href="{{config('app.url')}}/category/spa-accessories">Recreation001</a>
                               </li>
                               <li>
                               <a href="{{config('app.url')}}/category/spa-accessories">Recreation002</a>
                               </li>
                               <li>
                               <a href="{{config('app.url')}}/category/spa-accessories">Recreation003</a>
                               </li>
                               </ul>   
                         </li> --}}




                    <li class="lec_parentt"><a href="{{config('app.url')}}/blogs">Blog</a>
                    </li>
                    <li class="lec_parentt"><a href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="lec_main_menu_content_menu_copy">
                    <p>© Spa World 2020</p>
                    <!-- Social Buttons -->
                    <div class="lec_footer_social">
                        <a href="https://www.facebook.com/spaproductsupplier
" target="_blank"><i class="ti ti-facebook lec_icon_box"></i></a>
                        <a href="" target="_blank"><i class="ti ti-instagram lec_icon_box"></i></a>
                        <a href="
" target="_blank"><i class="ti ti-google lec_icon_box"></i></a>
                        <a href="
" target="_blank"><i class="ti ti-youtube lec_icon_box"></i></a>
                        <a href="
" target="_blank"><i class="ti ti-twitter lec_icon_box"></i></a>
                    </div>
                </div>
            </div>
            <!-- container end -->
        </div>


        <!-- menu content end -->

    </div>

</header>

<!-- Header End -->

<!-- head -->



@yield('slider')



<body class="lec_france">

    <!-- Page -->

    <div class="lec_page" id="lec_page">



        <!-- Contents -->



        @yield('content')



        <!-- section -->

        <section class="lec_section lec_section_no_overlay">

            <!-- Over -->

            <div class="lec_over" data-color="#333" data-opacity="0"></div>

            <div class="container text-center">

                <div class="row">

                    <div class="col-md-9 lec_animation_block lec_map_hidden_top"
                        data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, -80px, 0px)">

                        <div class="lec_map_container pt-m-10 pt-50">

                            @yield('google_map')

                        </div>

                    </div>

                    <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                        data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                        data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="images/main_back.jpg">

                        <!-- Over -->

                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>

                        <div class="lec_parallax_menu lec_image_bck lec_fixed">

                            <h2 class="lec_goldd lec_title_counter">Directions</h2>

                            <h3 class="lec_gold_subtitle">Our <br>Locations</h3>

                            <p>@yield('address')</p>

                            <a href="#contact" class="btn">Contact Spa World <i class="ti ti-email"></i></a>

                        </div>

                    </div>

                </div>

                <!-- row end -->

            </div>

            <!-- container end -->

        </section>

        <!-- section end -->

        <!-- section -->

        <section class="lec_section lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.2"
            data-image="{{ url('images/spaworld/slider-image-03.jpg') }}" data-bottom-top="@data-animation:noactive"
            data-200-bottom="@data-animation:active">

            <!-- Over -->

            <div class="lec_over" data-color="#013780" data-opacity="0.8"></div>

            <div class="container text-center">

                <!-- <div class="lec_gold">Live Music</div> -->

                <div class="lec_slide_title">100% Pure <br>Carrier Oils </div>

                <br>

                <p><img src="{{ url('images/organic_logo.png') }}" class="lec_light_shadow" alt="" height="200"></p>

                <!-- <div class="lec_slide_subtitle">THURSDAY<br>OCTOBER 27</div> -->

                <!--<p><img src="images/sign_wh.png" alt="" height="70"></p>-->

            </div>

            <!-- container end -->

        </section>

        <!-- section end -->

        <!-- section -->

        <div id="contact">

            <section class="lec_section lec_image_bck lec_fixed" data-stellar-background-ratio="0.2"
                data-image="{{ url('images/spaworld/slider-image-03.jpg') }}" data-bottom-top="@data-animation:noactive"
                data-200-bottom="@data-animation:active">

                <!-- Over -->

                <div class="lec_over" data-color="#fff" data-opacity="0.9"></div>

                <div class="container text-center">

                    <h2 class="lec_gold lec_title_counter">CONTACT</h2>

                    <h3 class="lec_gold_subtitle">Beauty supplier in Abu Dhabi, United Arab Emirates </h3>

                    <div class="row">

                        <form action="{{ url(route('savecontact')) }}" method="post">

                            @csrf

                            <!-- <div class="col-md-5 col-md-offset-1">

                           <p>Booking</p>

                           <input type="text" placeholder="Date" class="form-control">

                           <input type="text" placeholder="Time" class="form-control">

                           <input type="text" placeholder="Party" class="form-control">

                           </div> -->

                            <div class="col-md-10 col-md-offset-1">

                                <!-- <p>Contact Details</p> -->

                                <input type="text" name="name" required placeholder="Name" class="form-control">

                                <input type="email" name="email" required class="form-control" placeholder="Email">

                                <input type="text" name="phone" required placeholder="Phone" class="form-control">

                            </div>

                            <div class="col-md-10 col-md-offset-1">

                                <textarea name="message" class="form-control" placeholder="Message" rows="6"></textarea>

                            </div>

                            <div class="col-md-4 col-md-offset-4">

                                <input type="submit" class="btn btn_hover" value="Contact us">

                            </div>

                        </form>

                    </div>

                    <!-- row end -->

                </div>

                <!-- container end -->

            </section>

        </div>

        <!-- section end -->

        <!-- section -->

        <section class="lec_section lec_section_no_overlay">

            <!-- Over -->

            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>

            <div class="container text-center">

                <div class="row">

                    <div class="col-md-10 lec_animation_block lec_wht_txt"
                        data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, -80px, 0px)">

                        <div class="lec_virtual_close"><i class="ti ti-close"></i></div>

                        <div class="lec_virtual_play lec_image_bck">

                            <!-- Slider Texts -->

                            <div class="lec_slide_txt lec_slide_left_middle">

                                <img src="{{ url('images/organic_logo.png') }}" alt="" height="160"><br>

                                <!-- <div class="lec_gold">Discover Us</div> -->

                                <div class="lec_slide_subtitle">Play The Video</div>

                            </div>

                            <!-- Slider Texts End -->

                        </div>

                        <iframe height="615" src="https://www.youtube.com/embed/vBO2q23-6iUu?rel=0&amp;showinfo=0"
                            allowfullscreen></iframe>

                    </div>

                    <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                        data-bottom-top="transform:translate3d(0px, -80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, 0px, 0px)"
                        data-image="{{ url('images/main_back.jpg') }}">

                        <!-- Over -->

                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>

                        <div class="lec_parallax_menu lec_image_bck lec_fixed">

                            <h2 class="lec_gold lec_title_counter">S P A WORLD</h2>

                            <!-- <h3 class="lec_gold_subtitle">Tour</h3> -->

                            <h3>Contact Info</h3>

                            <div class="row lec_contacts_icons">

                                <i class="ti ti-location-pin"></i> @yield('address') <br>

                                <i class="ti ti-email"></i> <a href="mailto:@yield('email')">@yield('email')</a> <br>

                                <i class="ti ti-mobile"></i> <a href="tel:@yield('phone1')">@yield('phone1')</a> <br>

                                <i class="ti ti-link"></i> @yield('website') <br>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- row end -->

            </div>

            <!-- container end -->

        </section>

        <!-- section end -->

        </section>

        <!-- Content End -->





        <!-- End Contents -->

        <!-- Footer -->

        <footer class="lec_image_bck text-center lec_image_bck lec_fixed lec_wht_txt"
            data-stellar-background-ratio="0.3" data-image="{{ url('images/organic/footer.jpg') }}">

            <div class="lec_over" data-color="#013780" data-opacity="0.8"></div>

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <!-- Copyrights -->

                        <p><img src="{{ url('images/organic_logo.png') }}" class="organic_logo_img" alt="" height="150">
                        </p>

                        <p>Visa, MasterCard and restaurant vouchers. <br>

                            Transaction fee for payments by CC or food checks. <br>

                            No Bancontact.

                        </p>

                        <!-- Social Buttons -->

                        <div class="lec_footer_social">

                            <div data-animation="animation_blocks" data-bottom="@class:noactive"
                                data--100-bottom="@class:active">

                                <a href="@yield('facebook')" target="_blank"><i
                                        class="ti ti-facebook lec_icon_box"></i></a>

                                <a href="@yield('instagram')" target="_blank"><i
                                        class="ti ti-instagram lec_icon_box"></i></a>

                                <a href="@yield('googleplus')" target="_blank"><i
                                        class="ti ti-google lec_icon_box"></i></a>

                                <a href="@yield('youtube')" target="_blank"><i
                                        class="ti ti-youtube lec_icon_box"></i></a>

                                <a href="@yield('twitter')" target="_blank"><i
                                        class="ti ti-twitter lec_icon_box"></i></a>

                            </div>

                        </div>

                        <p><a href="http://www.reontel.com/">© Spa World 2020</a></p>

                    </div>

                </div>

            </div>

        </footer>

        <!-- Footer End -->

        <!-- JQuery -->

        <script src="{{ url('js/jquery-1.12.4.min.js') }}"></script>

        <!-- Library JS -->

        <script src="{{ url('js/lecker_library.js') }}"></script>

        <!-- Theme JS -->

        <script src="{{ url('js/lecker_script.js') }}"></script>

        <script src="{{ url('js/aos.js') }}"></script>

        <script>
        AOS.init({

            easing: 'ease-out-back',

            duration: 1000

        });
        </script>






        <!-- Footer End -->

    </div>

    <!-- Page End -->

</body>

</html>