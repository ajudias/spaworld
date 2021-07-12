@extends("website.theme.layout")
@section('content')

    <!-- Slider -->
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3"
        data-image="{{ asset('img/banner-1.jpg') }}">
        <!-- Firefly -->
        <div class="lec_slider_firefly" data-total="30" data-min="1" data-max="6"></div>
        <!-- Over -->
        <div class="lec_over" data-color="#041a38" data-opacity="0.5"></div>
        <div class="container">
            <!-- Slider Texts -->
            <div class="lec_slide_txt lec_slide_center_middle text-center">
                <img src="{{ asset('img/spa-lg-wt-br.png') }}" data-aos-easing="ease" data-aos-delay="300"
                    data-aos="zoom-in" class=" " alt="">
                <img src="{{ asset('img/logo.png') }}" data-aos-easing="ease" data-aos-delay="500" data-aos="zoom-in"
                    class="rotate" alt="">
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Choice of
                    Confidence</div>
            </div>
            <!-- Slider Texts End -->
        </div>
        <!-- container end -->
        <!-- Slide Down -->
        <a class="lec_scroll_down lec_go" href="#lec_content">
            <!--                <b></b>-->
            <i class="ti ti-angle-double-down"></i>
        </a>
    </div>

    <!-- Content -->
    <section id="lec_content" class="lec_content">
        <!-- section -->
        <section class="lec_section lec_section_no_overlay">
            <div class="lec_over" data-color="#e84e0e" data-opacity="0.05"></div>
            <!-- Over -->
            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
            <div class="container  ">
                <div class="row">
                    <div class="col-md-10 lec_animation_block" data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                        <img src="{{ asset('img/about.jpg') }}" alt="">
                    </div>
                    <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                        data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                        data-top-bottom="transform:translate3d(0px, 80px, 0px)"
                        data-image="{{ asset('images/main_back.jpg') }}">
                        <!-- Over -->
                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                            <h2 class="sectionhead">S P A WORLD</h2>
                            {!! $home->top_section_content !!}
                            <a href="{{route('gallery')}}" class="btn">View Our Gallery <i
                                    class="ti ti-angle-double-down"></i></a>
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->
        <!-- section -->
        <section id="ourproducts" class="lec_section lec_section_no_overlay">
            <div class="container text-center">
                <h2 class="sectionhead">Our Products</h2>
                @php($count = 0)
                @foreach ($pdtcatg as $pcatg)
                    @if ($count & 1)
                        <!-- First row  -->
                        <div class="row row_mb_100 text-left">
                            <div class="col-md-9 lec_animation_block" data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                                data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                                <img src="{{ url('storage/pdtcatg/' . $pcatg->image) }}" alt="{{ $pcatg->catg_name }}">
                            </div>
                            <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                                data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                                data-top-bottom="transform:translate3d(0px, 80px, 0px)"
                                data-image="{{ url('images/main_back.jpg') }}">
                                <!-- Over -->
                                <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                                <div class="lec_parallax_menu lec_image_bck lec_fixed">
                                    <h2 class="product_heads">{{ $pcatg->catg_name }}</h2>
                                    <p class="product_details">
                                        {{ $pcatg->short_description }}
                                    </p>
                                    <a href="{{ route('showproductcatg', $pcatg->url_slug) }}"
                                        class="btn more_prd_info">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    @else
                        <!-- Second Row -->
                        <div class="row row_mb_100 text-left">
                            <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posl lec_image_bck"
                                data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                                data-top-bottom="transform:translate3d(0px, -80px, 0px)"
                                data-image="{{ url('images/main_back.jpg') }}">
                                <!-- Over -->
                                <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                                <div class="lec_parallax_menu lec_image_bck lec_fixed">
                                    <h2 class="product_heads">{{ $pcatg->catg_name }}</h2>
                                    <p class="product_details">
                                        {{ $pcatg->short_description }}
                                    </p>
                                    <a href="{{ route('showproductcatg', $pcatg->url_slug) }}"
                                        class="btn more_prd_info">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-4 lec_animation_block"
                                data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                                data-top-bottom="transform:translate3d(0px, 80px, 0px)">
                                <img src="{{ url('storage/pdtcatg/' . $pcatg->image) }}"
                                    alt="{{ $pcatg->catg_name }}">
                            </div>
                        </div>

                        <!-- Second row end -->
                    @endif

                    @php($count++)
                @endforeach
            </div>
            <!-- container end -->
        </section>
        <!-- section end -->
        <!-- section -->
        <section class="lec_section">
            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
            <div class="container text-center">
                <h2 class=" spa_text_color">{{ $home->slider_title }}</h2>
                <!-- <h3 class="lec_gold_subtitle">Our product range includes Spa Products, Hotel Supplies and much more.</h3> -->
                <!-- --- slider  open  -->
                <div class="row">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="Pro_slid">
                                {{ $home->slider_description }}
                            </h3>
                        </div>
                        <div class="col-md-2">
                            <!-- Controls -->
                            <div class="controls pull-right ">
                                <a class="left fa fa-chevron-left btn btn_bg_le" href="#carousel-example"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn_bg_ri "
                                    href="#carousel-example" data-slide="next"></a>
                            </div>
                        </div>
                    </div>
                    <div id="carousel-example" class="carousel slide xs_none sm_none md_block lg_block xl_block  "
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/sandalwoodpowder.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Sandalwood
                                                powder </span>
                                            <p class="product_p">Natural heartwood powder </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go" href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/papayaspasalt.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Papaya spa
                                                salt</span>
                                            <p class="product_p">Spa salt </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/bodywraps.jpg" alt=""
                                                    class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Body
                                                wraps</span>
                                            <p class="product_p">Skin care </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/moroccanblacksoap.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Moroccan black
                                                soap</span>
                                            <p class="product_p">Skin care </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/rasulmud.jpg" alt=""
                                                    class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Rasul
                                                mud</span>
                                            <p class="product_p">Skin care </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/waxroll.jpg" alt=""
                                                    class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Wax roll</span>
                                            <p class="product_p">Skin care </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/cuticleremover.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Cuticle
                                                remover</span>
                                            <p class="product_p"> Spa World </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/herbalmassageco-mpress.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Herbal massage
                                                compress</span>
                                            <p class="product_p"> </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mob slider open  -->
                <div class="condainer xs_block sm_block md_none lg_none xl_none ">
                    <div class="row">
                        <div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/herbalmassageco-mpress.jpg"
                                                    alt="" class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Herbal massage
                                                compress</span>
                                            <p class="product_p"> </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="cook">
                                            <div class="cook_imge lec_content_pro">
                                                <img src="https://www.spaworlduae.com/storage/products/eyepillow.jpg" alt=""
                                                    class=" img_cook img-responsive">
                                            </div>
                                            <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Eye
                                                pillow</span>
                                            <p class="product_p"> </p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_  lec_go " href="cart.html">
                                                            <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i> Add
                                                                Cart </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ " href="prodecutdetails.html">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mob slider end  -->
                <!-- slider end  -->
            </div>
        </section>
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


                            <h3>{{ $gens->company_name }} </h3>
                            <div class="row lec_contacts_icons">
                                <i class="ti ti-location-pin"></i> {{ $gens->address }}
                                <br>
                                <i class="ti ti-email"></i>
                                <a
                                    href="">
                                    <span class="__cf_email__"
                                        data-cfemail="">{{$gens->email1}}</span>
                                </a> <br>
                                @if ($gens->email2)
                                    <a
                                    href="">
                                    <span class="__cf_email__"
                                        data-cfemail="">{{$gens->email2}}</span>
                                </a> 
                                @endif
                                <i class="ti ti-mobile"></i>
                                <a href="tel:{{$gens->phone1}}">{{$gens->phone1}}</a> <br>
                                @if ($gens->phone2)
                                    <i class="ti ti-mobile"></i>
                                    <a href="tel:{{$gens->phone1}}">{{$gens->phone1}}</a> <br>
                                @endif
                                <i class="ti ti-link"></i>
                                <a href="{{$gens->website}}">{{$gens->website}}</a>
                                <br>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- row end -->

            </div>

            <!-- container end -->

        </section>
    </section>
@endsection
