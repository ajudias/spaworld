<!DOCTYPE html>

<html lang="en">

<!-- head -->

<!-- head -->

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('meta-data')


    <link rel="icon" href="{{ asset('img/cropped-fav-32x32.png') }}" sizes="32x32" />

    <link rel="icon" href="{{ asset('img/cropped-fav-192x192.png') }}" sizes="192x192" />

    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/cropped-fav-180x180.png') }}" />

    <!-- Library CSS -->

    <link href="{{ asset('css/lecker_library.css') }}" rel="stylesheet">

    <!-- Icons CSS -->

    <link href="{{ asset('fonts/themify-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('fonts/selima/stylesheet.css') }}" rel="stylesheet">

    <!-- Theme CSS -->

    <link href="{{ asset('css/lecker_style.css') }}" rel="stylesheet">

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Lato" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





    <!-- -- slider start--- -- -->
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css">
  <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/accessible-slick-theme.min.css">

  <!-- slider end -- -->
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">

    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/sub_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" />




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




<a href="#lec_page" class="lec_top lec_go"><b class="ti ti-angle-up"></b></a>
<body class="lec_france">

    <!-- Page -->

    <!-- To Top -->

    <div class="over-menu"></div>
    <div class="wrap">

        <!-- Header -->
        <header class="header_SpaMenuSection white">
            <nav class="navbar navbar-inverse SpaWoldNav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse"
                                    data-target=".js-navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="{{route('homepage')}}" class="lec_logo">
                                    <span
                                        style="-webkit-transition-delay: 0.1s;-o-transition-delay: 0.1s;transition-delay: 0.1s;">S</span>
                                    <span
                                        style="-webkit-transition-delay: 0.2s;-o-transition-delay: 0.2s;transition-delay: 0.2s;">P</span>
                                    <span
                                        style="-webkit-transition-delay: 0.4s;-o-transition-delay: 0.4s;transition-delay: 0.4s;margin-left: -1px;">A</span>
                                    <span class="world"
                                        style="-webkit-transition-delay: 0.5s;-o-transition-delay: 0.5s;transition-delay: 0.5s;">WORLD</span>
                                    <i><span>Hotel & Spa</span><span>Supplier</span></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="collapse navbar-collapse js-navbar-collapse ">
                                <ul class="nav navbar-nav">
                                    @isset($categoriess)
                                        @foreach ($categoriess as $category)
                                            <li class="dropdown">
                                                <a data-target=" #" href=" #" class="dropdown-toggle " data-hover="dropdown"
                                                    role="button" aria-expanded="false">{{ $category->catg_name }}
                                                    @if (count($category->sub_category) > 0)
                                                        <span class="caret"></span>
                                                    @endif
                                                </a>
                                                <ul class="dropdown-menu SpaMenu Spalink SpaMr">
                                                    @forelse ($category->sub_category as $item)
                                                        <li>
                                                            <a
                                                                href="{{ route('showproductcatg', $item->url_slug) }}">{{ $item->sub_catg_name }}</a>
                                                        </li>
                                                    @empty
                                                        <li>
                                                            <a
                                                                href="{{ config('app.url') }}/category/spa-accessories">{{ $item->sub_catg_name }}</a>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                        @endforeach
                                        </li>
                                    @endisset
                                </ul>
                                <ul class="nav navbar-nav navbar-right    Spalink ">
                                    <li class="dropdown mega-dropdown Spalink">
                                        <a href="{{route('gallery')}}" class="dropdown-toggle">Gallery </a>
                                    </li>
                                    <li class="SpaMenu Spalink">
                                        <a href="{{route('cart')}}" class="cart_a"> <span><i
                                                    class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                            <span id="cartCount">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Header End -->
        @yield('slider')
        <!-- Contents -->
        @yield('content')
        <!-- Footer -->
        <footer class="lec_image_bck text-center lec_image_bck lec_fixed lec_wht_txt"
            data-stellar-background-ratio="0.3" data-image="https://www.spaworlduae.com/images/organic/footer.jpg">
            <div class="lec_over" data-color="#013780" data-opacity="0.8"></div>
            <div class="container">
                <div class="row">
                    <p><img src="images/organic_logo.png" class="organic_logo_img" alt="" height="150">
                    </p>
                    <div class="col-md-5">
                        {{$gens->footer_content}}
                        <p style="padding: 0 !important; margin: 0 !important;">
                        <div class="lec_footer_social">
                            <div data-animation="animation_blocks" data-bottom="@class:noactive"
                                data--100-bottom="@class:active">
                                <a href="{{$gens->facebook}}" target="_blank"><i
                                        class="ti ti-facebook lec_icon_box"></i></a>
                                <a href="{{$gens->twitter}}" target="_blank"><i class="ti ti-instagram lec_icon_box"></i></a>
                                <a href="{{$gens->youtube}}" target="_blank"><i class="ti ti-youtube lec_icon_box"></i></a>
                            </div>
                        </div>
                        </p>
                        <a href="{{$gens->website}}">© Spa World 2021</a>
                    </div>
                    <div class="col-md-2">
                        <h3 style="margin-top: 0;">More Links</h3>
                        <ul>
                            <li> <a href="{{ route('homepage') }}"> Home</a> </li>
                            <li> <a href="{{ route('about') }}"> About</a> </li>
                            <li> <a href="{{ route('blogs') }}"> Blog</a> </li>
                            <li> <a href="{{ route('gallery') }}"> Gallery</a> </li>
                            <li> <a href="{{ route('contactus') }}" class="lec_go">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <h3 style="margin-top: 0;"> Contact Info</h3>
                        <b> {{ $gens->company_name ?? 'SPAWORLD GENERAL TRADING & LLC' }}</b>
                        <ul>
                            <li>{{ $gens->address ?? 'Spaworld, Mussafah 17, Abu Dhabi, UAE' }}</li>
                            <li><a href="mailto:{{$gens->email1}}"> {{$gens->email1}}</a></li>
                            @if ($gens->email2)
                            <li><a href="mailto:{{$gens->email2}}"> {{$gens->email2}}</a></li>
                                
                            @endif
                            <li><a href="tel:{{$gens->phone1}}">{{$gens->phone1}} </a> </li>
                            @if ($gens->phone2)
                                
                            <li><a href="tel:{{$gens->phone2}}">{{$gens->phone2}} </a> </li>
                            @endif
                            <li><a href="{{$gens->website}} ">{{$gens->website}} </a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="footer_uLine">
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Footer End -->

    </div>

    <!-- JQuery -->

    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

    <!-- Library JS -->

    <script src="{{ asset('js/lecker_library.js') }}"></script>

    <!-- Theme JS -->

    <script src="{{ asset('js/lecker_script.js') }}"></script>

    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script>
    <script>
        AOS.init({

            easing: 'ease-out-back',

            duration: 1000

        });
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                    $(this).toggleClass('open');
                }
            );
        });
        var cartCountItems=0;
        $(document).ready(function () {
            cartCount();
        });

        $(document).on('click','.checkout-btn',function(e){
            if(cartCountItems==0){
                window.location.href='/';
            }
        })

        function cartCount()
        {
            $.ajax({
                url: '{{route("cartCount")}}',
                method: "POST",
                data:{
                    '_token':'{{csrf_token()}}'
                },
                success: function (res) {
                    cartCountItems=res.count;
                    if(cartCountItems==0){
                        $('.checkout-btn').text('Go Home');
                      
                    }
                    $('#cartCount').html(cartCountItems);
                }
            });
        }
        function addToCart(product_id,quantity,override=false,add=false,e){
            if(override){
                quantity=$('#quantity').val()
                if(add){
                    if($(e).hasClass('inc')){
                        quantity++
                    }
                    if($(e).hasClass('dec')){
                        quantity--
                    }
                }
            }
            
            $.ajax({
                type: "POST",
                url: "{{route('addToCart')}}",
                data: {
                    '_token':'{{csrf_token()}}',
                    'product_id':product_id,
                    'quantity':quantity
                },
                success: function (response) {
                    console.log(response);
                    var type=response.status_code==404?'info':'success';
                    cartCount()
                    location.reload();
                    if(!add){
                        $.toast({
                            heading: 'Added to Cart',
                            // text: 'Item added to cart',
                            position: 'top-right',
                            stack: false,
                            icon:"success"
                        })
                        
                    }
                    
                },
                errror:function(res){
                    console.log(res);
                }
            });
            
        }

        function removeFromCart(product_id){
            var data = {
                '_token': '{{csrf_token()}}',
                "product_id": product_id,
            };
            $.ajax({
                url: "{{route('removeFromCart')}}",
                type: 'DELETE',
                data: data,
                success: function (response) {
                    // Swal.fire({
                    //     title: response.status,
                    //     type: "success",
                    // })
                    $.toast({
                            heading: 'Removed from cart',
                            // text: 'Item added to cart',
                            position: 'top-right',
                            stack: false,
                            icon:"info"
                        })
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            });
        }
    </script>
    @yield('scripts')
</body>

</html>
