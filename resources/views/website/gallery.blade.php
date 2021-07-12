@extends("website.theme.layout")

@section('mystyles')
    <style>
        .lec_slider {
            height: 50vh;
        }

        .lec_section .container {
            padding-top: 45px;
        }

    </style>
@endsection

@section('slider')
    <!-- Slider -->
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3"
        data-image="{{ url('img/banner-1.jpg') }}">
        <!-- Firefly -->
        <div class="lec_slider_firefly" data-total="30" data-min="1" data-max="6"></div>
        <!-- Over -->
        <div class="lec_over" data-color="#041a38" data-opacity="0.5"></div>
        <div class="container">
            <!-- Slider Texts -->
            <div class="lec_slide_txt lec_slide_center_middle text-center">
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Gallery</div>
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
    <!-- Slider End -->
@endsection

@section('content')
    <section id="lec_content" class="lec_content">
        @foreach ($categories as $category)
            <div class="GalleryHeadText">
                <h2 class="sectionhead"> {{ $category->catg_name }}
                    <div class="GalleryTextDivid"></div>
                </h2>
            </div>
            <section class="lec_section lec_section_no_overlay lec_image_bck lec_image_bck_no_cover">
                <div class=" text-center">
                    <div class="container">
                        <div class="row cond ">
                            @foreach ($category->product as $item)
                                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12  cond_hight pt_10">
                                    <a href="{{ route('productDetails', $item->url_slug) }}">
                                        <div class="cook">
                                            <div class="cook_imge">
                                                <img src="{{ asset('storage/products/' . $item->image1) }}"
                                                    alt="{{ $item->image1_alt }}" class=" img_cook img-responsive">
                                            </div>
                                            <!-- <span class="lec_news_title lec_gold_subtitle alin_cook">Spa Products Sales</span> -->
                                            <p class="p_font mb-0">{{ $item->product_name }}</p>
                                            <div class="ProdecutBox">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6">
                                                        @php
                                                            if (Cookie::get('spaworldCartCookie')) {
                                                                $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
                                                                $cart_data = json_decode($cookie_data, true);
                                                                $item_id_list = array_column($cart_data, 'item_id');
                                                                $showTickIcon = false;
                                                                if (in_array($item->id, $item_id_list)) {
                                                                    $showTickIcon = true;
                                                                }
                                                            } else {
                                                                $showTickIcon = false;
                                                            }
                                                        @endphp
                                                        @isset($showTickIcon)
                                                            @if (!$showTickIcon)
                                                                <a class="btn_ " href="javascript:void(0)"
                                                                    onclick="addToCart({{ $item->id }},1)">
                                                                    <div class="ProBoxBtn">
                                                                        <i class="ti ti-shopping-cart"> </i>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a class="btn_ " href="route('cart')">
                                                                    <div class="ProBoxBtn">
                                                                        <i class="fa fa-check"> </i>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        @endisset

                                                    </div>
                                                    <div class="col-xs-6 col-sm-6">
                                                        <a class="btn_ "
                                                            href="{{ route('productDetails', $item->url_slug) }}">
                                                            <div class="ProBoxBtn"><i class="fa fa-server"
                                                                    aria-hidden="true"></i> Read More </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </section>
@endsection
