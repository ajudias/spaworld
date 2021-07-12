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
            <h2 class=" spa_text_color">Trending Products</h2>
            <!-- <h3 class="lec_gold_subtitle">Our product range includes Spa Products, Hotel Supplies and much more.</h3> -->
            <!-- --- slider  open  -->
            <div class="row">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="Pro_slid">
                            Our product range includes Spa Products, Hotel Supplies and much more.
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
                                            <img src="https://www.spaworlduae.com/storage/products/papayaspasalt.jpg" alt=""
                                                class=" img_cook img-responsive">
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
    </script>
@endsection
