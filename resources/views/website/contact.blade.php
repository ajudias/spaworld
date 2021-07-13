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
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Contact Us
                </div>
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
    <section class="lec_section lec_section_no_overlay">
        <div class="lec_over" data-color="#333" data-opacity="0"></div>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-9 lec_animation_block lec_map_hidden_top"
                    data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                    data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                    <div class="lec_map_container pt-m-10 pt-50">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                {!! $gens->google_map ??
    '<iframe width="100%" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=S%20P%20A%20WORLD%20GENERAL%20TRADING%20LLC&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck"
                    data-bottom-top="transform:translate3d(0px, 0px, 0px)"
                    data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="images/main_back.jpg">
                    <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                    <div class="lec_parallax_menu lec_image_bck lec_fixed">
                        <h2 class="lec_goldd lec_title_counter">Directions</h2>
                        <h3 class="lec_gold_subtitle">Our <br>Locations</h3>
                        <p class="p_font text-center">
                            {{ $gens->address ?? 'Spaworld, Mussafah 17, Abu Dhabi, UAE' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="contact">
        <section class="lec_section lec_image_bck lec_fixed" data-stellar-background-ratio="0.2"
            data-image="https://www.spaworlduae.com/images/spaworld/slider-image-03.jpg"
            data-bottom-top="@data-animation:noactive" data-200-bottom="@data-animation:active">
            <div class="lec_over" data-color="#fff" data-opacity="0.9"></div>
            <div class="container text-center SpaContact">
                <div class="row">

                    <div class="col-12">
                        <h2 class="lec_gold lec_title_counter">CONTACT - US</h2>
                        <h3 class="lec_gold_subtitle">Beauty supplier in Abu Dhabi, United Arab Emirates </h3>
                    </div>

                    <div class="col-md-6 lec_animation_block lec_map_hidden_top skrollable skrollable-between"
                        data-bottom-top="transform:translate3d(0px, 80px, 0px)"
                        data-top-bottom="transform:translate3d(0px, -80px, 0px)"
                        style="transform: translate3d(0px, -4.0678px, 0px);">
                        <div class="lec_map_container    ">
                            <img src="{{ asset('img/sap-mail.png') }}" class="img-responsive">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="row">
                            <form action="{{ route('ajaxsavecontact') }}" method="post">
                                @csrf

                                <div class="col-md-10 col-md-offset-1">

                                    <input type="text" name="name" required placeholder="Name" class="form-control"
                                        required>
                                    <input type="email" name="email" required class="form-control" placeholder="Email"
                                        required>
                                    <input type="number" name="phone" required placeholder="Phone" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea name="message" class="form-control" placeholder="Message" rows="6"
                                        required></textarea>
                                </div>
                                <div class="col-md-7 col-md-offset-4 text-right">
                                    <input type="submit" class="btn btn_hover" value="Contact us">
                                    {{-- <a href="#" class="btn" onclick="sendcontact()">Send <i class="ti ti-email"></i></a> --}}
                                </div>
                                @if (session('Error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('Error') }}
                                    </div>
                                @endif

                                @if (session('Success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('Success') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>

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

@endsection

@section('footerscript')
    <script>
        // var tiles = [];
        // var dialog, dialogOverlay, dialogCloseButton, dialogOkButton;
        // var triggeringElement;

        // window.addEventListener('DOMContentLoaded', function(e) {
        //     dialog = document.querySelector('.dialog');
        //     dialogOverlay = dialog.querySelector('.overlay');
        //     dialogCloseButton = dialogOverlay.querySelector('.close-button');
        //     dialogOkButton = dialogOverlay.querySelector('.ok-button');

            /**
              Once Slick has initialized, retrieve the relevant DOM elements and setup quick view functionality 
            */
            // $('.carousel').on('init', function(e, slick) {
                // tiles = document.querySelectorAll('.carousel .tile');

                // Activating any tile should launch the quick view modal
                // tiles.forEach(function (tile) {
                //    tile.addEventListener('click', openDialog);
                // });
            // });

            /**
              Initialize Slick Slider with recommended configuration options
            */
            $('.carousel-inner').slick({
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

            // Close the dialog when any of its interactive elements are activated
        //     dialogCloseButton.addEventListener('click', closeDialog);
        //     dialogOkButton.addEventListener('click', closeDialog);

        //     // Clicking anywhere outside the dialog content should close the dialog
        //     dialog.addEventListener('click', handleDialogClicks);
        //     dialog.addEventListener('keydown', handleDialogKeypresses);
        // });


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
