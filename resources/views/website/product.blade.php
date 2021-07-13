@extends("website.theme.layout")

@section('mystyles')
    <style>
        .lec_slider {
            height: 50vh;
        }

        .lec_section .container {
            padding-top: 45px;
        }

        .img-item {
            border: solid 1px #ccc;
        }

        .prohed {
            padding: 50px 0px 50px 0px;
        }

        .prohed h2 {
            margin-bottom: 5px;
            padding-top: 20px;
        }

        .card-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        .img-display {
            overflow: hidden;
        }

        .img-showcase {
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }

        .img-showcase img {
            min-width: 100%;
        }

        .img-select {
            display: flex;
        }

        .img-item {
            margin: 0.3rem;
        }

        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3) {
            margin-right: 0;
        }

        .img-item:hover {
            opacity: 0.8;
        }

        .product-content {
            padding: 2rem 1rem;
        }

        .product-title {

            text-transform: capitalize;

            position: relative;

            margin: 1rem 0;
        }

        .product-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;

        }

        .product-link {
            text-decoration: none;
            text-transform: uppercase;


            display: inline-block;
            margin-bottom: 0.5rem;

            color: #fff;
            padding: 0 0.3rem;
            transition: all 0.5s ease;
        }

        .product-link:hover {
            opacity: 0.9;
        }

        .product-rating {
            color: #ffc107;
        }

        .product-rating span {

            color: #252525;
        }

        .product-price {
            margin: 1rem 0;


        }

        .last-price span {

            text-decoration: line-through;
        }

        .product-detail h2 {
            text-transform: capitalize;

            padding-bottom: 0.6rem;
        }

        .product-detail p {

            padding: 0.3rem;
            opacity: 0.8;
        }

        .product-detail ul {
            margin: 1rem 0;

        }

        @media screen and (min-width: 992px) {
            .card {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 1.5rem;
            }

            .card-wrapper {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .product-imgs {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .product-content {
                padding-top: 0;
            }
        }

        .spaProSli {
            margin: 0px 10px 10px 10px !important;
        }

        .spaImgMar {
            margin: 5px;
        }

        .carousel {
            position: relative;
            width: calc(100% - 100px);
            max-width: 100%;
            margin-left: 50px;
        }


        .bg-white {
            background-color: white;
            background: white !important;
        }

        .is-control {
            background: 0;
            border: 0;
            padding: 0 10px;
            z-index: 1;
            cursor: pointer;

            font-size: 40px;
            color: rgba(0, 0, 0, .6);

            transition: all .2s linear;
        }

        .is-control:hover {
            color: rgba(0, 0, 0, 1);
        }

        .is-control:focus {
            outline: none;
            background-color: rgba(0, 0, 0, .8);
            color: rgba(255, 255, 255, 1);
            border-radius: 5px;
        }

        .previous-button {
            position: absolute;
            left: -50px;
            top: 45%;
        }

        .next-button {
            position: absolute;
            right: -50px;
            top: 45%;
        }



        .tile {
            height: var(--carousel-height);
            position: relative;

            padding: 0;
            border: 0;
            background: none;
            cursor: pointer;
        }

        .tile:focus {
            outline: 0;
        }

        .slick-slide:not(:last-of-type) {
            margin-right: var(--tile-margin);
        }

        .tile .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tile .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            display: flex;
            justify-content: center;
            align-items: center;

            background-color: rgba(0, 0, 0, .6);

            transition: opacity .1s linear;
            opacity: 0;
        }

        .tile:focus .overlay,
        .tile:hover .overlay {
            opacity: 1;
        }

        .tile .overlay .quick-view-button {
            padding: 10px 15px;

            background: rgba(0, 0, 0, .7);
            border: 3px solid white;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, .6);

            color: white;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
        }


        /**
                 Quick view dialog
              */
        .dialog {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            background-color: rgba(0, 0, 0, .6);
            z-index: 100;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dialog.is-hidden {
            display: none;
        }

        .dialog .overlay {
            background-color: white;
            border-radius: 10px;

            position: relative;

            width: 80%;
            max-width: 400px;
            padding: 20px;
        }

        .dialog .overlay .close-button {
            position: absolute;
            top: 15px;
            right: 10px;

            background: none;
            border: 0;
            font-size: 18px;
            cursor: pointer;
        }

        .dialog .overlay .title {
            margin: 0;
        }

        .dialog .overlay .ok-button {
            padding: 10px 15px;
            background: royalblue;
            border: 0;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .dialog .overlay .ok-button:focus {
            outline-offset: 5px;
        }

        /* Credits at bottom **/
        .credits {
            margin-left: 40px;
            padding: 10px;
            font-size: 14px;
            color: black;
            text-decoration: none;
            opacity: .7;
        }

        .credits img {
            height: 30px;
            margin-left: 5px;
            margin-top: -2px;
            vertical-align: middle;
        }

        .credits:hover,
        .credits:focus {
            opacity: 1;
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
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">
                    {{ $product->product_name }}</div>
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
    <section class="prohed ">
        <div class="card-wrapper">
            <div class="card">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            @for ($i = 1; $i < 6; $i++)
                                @php
                                    $productImage = 'image' . $i;
                                    $productAlt = 'image' . $i . 'alt';
                                @endphp
                                <img src="{{ asset('storage/products/' . $product->$productImage) }}"
                                    alt="{{ $product->$productAlt }}" width="50px">
                            @endfor
                        </div>
                    </div>
                    <div class="img-select">
                        @for ($i = 1; $i < 6; $i++)
                            @php
                                $productImage = 'image' . $i;
                                $productAlt = 'image' . $i . 'alt';
                            @endphp
                            @if ($product->$productImage) 
                                <div class="img-item">
                                    <a href="#" data-id="{{ $i }}">
                                    <img src="{{ asset('storage/products/' . $product->$productImage) }}"
                                            alt="{{ $product->$productAlt }}" width="50px">
                                    </a>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">


                    <div class="product-detail">
                        <h2> {{ $product->product_name }}</h2>
                        <h5>{{ $product->short_description ?? '' }}</h5>
                        {!! $product->long_description !!}
                    </div>

                    <div class="ProdecutBox">
                        <a href="javascript:void(0)">
                        </a>
                        <div class="row">
                            <a href="javascript:void(0)">
                            </a>
                            <div class="col-xs-6 col-sm-6">
                                <a href="javascript:void(0)">
                                </a>
                                <a class="btn_  " href="javascript:void(0)" onclick="addToCart({{ $product->id }},1)">
                                    <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i></div>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <a class="btn_ " href="">
                                    <div class="ProBoxBtn"><i class="fa fa-server" aria-hidden="true"></i> Contact Us</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        {{-- <div class="controls pull-right ">
                            <a class="left fa fa-chevron-left btn btn_bg_le" href="#carousel-example"
                                data-slide="prev"></a><a class="right fa fa-chevron-right btn btn_bg_ri "
                                href="#carousel-example" data-slide="next"></a>
                        </div> --}}
                    </div>
                </div>
                <div class="carousel">
                    @forelse ($trendingProducts as $item)
                        <div class="cook tile">
                            <div class="bg-white spaImgMar ">
                                <div class="cook_imge spaProSli lec_content_pro">
                                    <img src="{{ asset('storage/products/' . $item->image1) }}"
                                        alt="{{ $item->image1_alt }}" class=" img_cook img-responsive">
                                </div>

                                <span
                                    class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">{{ $item->product_name }}</span>
                                {{-- <p class="product_p">Spa salt </p> --}}
                                <div class="ProdecutBox">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6">
                                            <a class="btn_  lec_go " href="javascript:void(0)"
                                                onclick="addToCart({{ $item->id }},1)">
                                                <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i></div>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <a class="HoverBlue"
                                                href="{{ route('productDetails', $item->url_slug) }}">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="cook tile">
                            <div class="bg-white spaImgMar ">
                                <div class="cook_imge spaProSli lec_content_pro">
                                    <img src="https://www.spaworlduae.com/storage/products/papayaspasalt.jpg" alt=""
                                        class=" img_cook img-responsive">
                                </div>

                                <span class="lec_news_title lec_gold_subtitle alin_cook f_h_spa">Papaya spa
                                    salt</span>
                                <p class="product_p">Spa salt </p>
                                <div class="ProdecutBox">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6">
                                            <a class="btn_  lec_go " href="#">
                                                <div class="ProBoxBtn"><i class="ti ti-shopping-cart"> </i></div>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <a class="HoverBlue" href="#">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- slider end  -->
        </div>
    </section>
    <!-- section end -->
@endsection
@section('scripts')
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);

        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 4,
                prevArrow: '<button class="previous-button is-control">' +
                    '  <span class="fas fa-angle-left" aria-hidden="true"></span>' +
                    '  <span class="sr-only">Previous slide</span>' +
                    '</button>',
                nextArrow: '<button class="next-button is-control">' +
                    '  <span class="fas fa-angle-right" aria-hidden="true"></span>' +
                    '  <span class="sr-only">Next slide</span>' +
                    '</button>',
                responsive: [{
                        breakpoint: 975,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 675,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 375,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                ]
                // responsive: [{
                //       breakpoint: 575,
                //       settings: {
                //          slidesToShow: 2
                //       }
                //    },
                //    {
                //       breakpoint: 375,
                //       settings: {
                //          slidesToShow: 1
                //       }
                //    }
                // ]
            });

    })
    </script>
@endsection
