@extends("website.theme.layout")
@section('mystyles')
    <style>
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
                            <a href="{{ route('gallery') }}" class="btn">View Our Gallery <i
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
        <!-- section -->
        <section class="lec_section lec_section_no_overlay">
            <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6 lec_animation_block lec_wht_txt"
                        data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                        <!-- <iframe height="615" src="https://www.youtube.com/embed/vBO2q23-6iUu?rel=0&amp;showinfo=0" allowfullscreen></iframe> -->
                        <div class="contactVodeoSlider">
                            <!-- Carousel container -->
                            <div id="my-pics" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @forelse ($links as $key=>$link)
                                        <li data-target="#my-pics" data-slide-to="{{ $key }}" class="active"></li>
                                    @empty
                                        <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                                    @endforelse
                                </ol>
                                <!-- Content -->
                                <div class="carousel-inner" role="listbox">
                                    @forelse ($links as $link)
                                        <div class="item active HomeProSliderH">
                                            <iframe width="100%" height="100%" src="{{ $link->link }}">
                                            </iframe>
                                        </div>
                                    @empty
                                        <div class="item active HomeProSliderH">
                                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ht9NI9-pTZo">
                                            </iframe>
                                        </div>
                                    @endforelse
                                </div>
                                <!-- Previous/Next controls -->
    
                                <div class="ContactSideVideo">
                                    <div>
                                        <a class="left carousel-control ContactSideVideoA" href="#my-pics" role="button"
                                            data-slide="prev">
                                            <span class="icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="right carousel-control ContactSideVideoA" href="#my-pics" role="button"
                                            data-slide="next">
                                            <span class="icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
    
    
    
                            </div>
                        </div>
    
    
    
                    </div>
                    <div class="col-md-6 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                        data-bottom-top="transform:translate3d(0px, -80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, 0px, 0px)"
                        data-image="https://www.spaworlduae.com/images/main_back.jpg">
                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                            <h2 class="lec_gold lec_title_counter"> Contact Info</h2>
                            <h3> {{ $gens->company_name ?? 'SPAWORLD GENERAL TRADING & LLC' }} </h3>
                            <div class="row lec_contacts_icons">
                                <i class="ti ti-location-pin"></i>
                                {{ $gens->address ?? 'Spaworld, Mussafah 17, Abu Dhabi, UAE' }}
                                <br>
                                <i class="ti ti-email"></i>
                                <a href="javascript:void(0)"><span class="__cf_email__"
                                        data-cfemail="">{{ $gens->email1 }}</span></a> <br>
                                @if ($gens->email2)
                                    <i class="ti ti-email"></i>
                                    <a href="javascript:void(0)"><span class="__cf_email__"
                                            data-cfemail="">{{ $gens->email2 }}</span></a>
                                @endif
                                <i class="ti ti-mobile"></i>
                                <a href="tel:+{{ $gens->phone1 }}">+{{ $gens->phone1 }}</a> <br>
                                @if ($gens->phone2)
                                    <i class="ti ti-mobile"></i>
                                    <a href="tel:+{{ $gens->phone2 }}">+{{ $gens->phone2 }}</a> <br>
                                @endif
                                <i class="ti ti-link"></i>
                                <a href="{{ $gens->website }}">{{ $gens->website }}</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('scripts')
<script>
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


    /**
      NOTE: Modal dialog implementation for code demo purposes only!
    */
    function openDialog(e) {
        e.preventDefault();
        triggeringElement = e.target;
        dialog.classList.remove('is-hidden');
        dialogCloseButton.focus();
    }

    function closeDialog() {
        triggeringElement.focus();
        dialog.classList.add('is-hidden');
    }

    function handleDialogClicks(e) {
        if (!dialogOverlay.contains(e.target)) {
            closeDialog();
        }
    }

    function handleDialogKeypresses(e) {
        switch (e.key) {
            case 'Escape':
                closeDialog();
                break;

            case 'Tab':
                if (e.shiftKey && document.activeElement === dialogCloseButton) {
                    e.preventDefault();
                    dialogOkButton.focus();
                } else if (!e.shiftKey && document.activeElement === dialogOkButton) {
                    e.preventDefault();
                    dialogCloseButton.focus();
                }

                break;
        }
    }
</script>
@endsection
