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
    @php
    if(!empty($subcatg)){
        if($subcatg->image){
            $imageName='storage/pdtsubcatg/'.$subcatg->image;
        }else{
            $imageName='img/banner-1.jpg';
        }
    }
    if(!empty($catg)){
        if($catg->image){
            $imageName='storage/pdtcatg/'.$catg->image;
        }
        else{
            $imageName='img/banner-1.jpg';
        }
    }
    if(file_exists(config('app.url').'/'.$imageName)){
        $imageName='img/banner-1.jpg';
    }
    @endphp
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3"
        data-image="{{ asset($imageName) }}">
        <!-- Firefly -->
        <div class="lec_slider_firefly" data-total="30" data-min="1" data-max="6"></div>
        <!-- Over -->
        <div class="lec_over" data-color="#041a38" data-opacity="0.5"></div>
        <div class="container">
            <!-- Slider Texts -->
            <div class="lec_slide_txt lec_slide_center_middle text-center">
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">
                    {{ !empty($subcatg) ? $subcatg->sub_catg_name : (!empty($catg) ? $catg->catg_name : '')  }}</div>
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

    <!-- Content -->
    <section id="lec_content" class="lec_content lec_content_pro">
        <section class="lec_section lec_section_no_overlay lec_image_bck lec_image_bck_no_cover">
            <div class=" text-center">
                <div class="container">
                    <div class="row cond ">

                        @foreach ($products as $product)
                            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-xs-12  cond_hight pt_10">
                                <div class="cook">
                                    <div class="cook_imge lec_content_pro">
                                        <img src="{{ asset('storage/products/' . $product->image1) }}"
                                            alt="{{ $product->image1_alt }}" class=" img_cook img-responsive">
                                    </div>
                                    <span
                                        class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">{{ $product->product_name }}</span>
                                    <p>{{ $product->short_description }} </p>

                                    <!--<p><a class="btn" href="#contact">Add to Cart <i class="ti ti-shopping-cart"></i></a> </p>-->
                                    <p>
                                        @php
                                            if (Cookie::get('spaworldCartCookie')) {
                                                $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
                                                $cart_data = json_decode($cookie_data, true);
                                                $item_id_list = array_column($cart_data, 'item_id');
                                                $showTickIcon = false;
                                                if (in_array($product->id, $item_id_list)) {
                                                    $showTickIcon = true;
                                                }
                                            } else {
                                                $showTickIcon = false;
                                            }
                                        @endphp
                                        @isset($showTickIcon)
                                            @if (!$showTickIcon)

                                                <a class="btn_"
                                                    style="background-color: #8e8279;padding: 8px 40px; color: white;border-radius: 5px;font-size: 18px;"
                                                    href="javascript:void(0)" onclick="addToCart({{ $product->id }},1)">
                                                    <i class="ti ti-shopping-cart"></i></a>
                                            @else
                                                <a class="btn_ " style="background-color: #8e8279;padding: 8px 40px; color: white;border-radius: 5px;font-size: 18px;" href="{{route('cart')}}">
                                                        <i class="fa fa-check"> </i>
                                                </a>
                                            @endif
                                        @endisset

                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>



    @endsection
    @section('footerscript')

    @endsection
