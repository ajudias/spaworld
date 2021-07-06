@extends("website.theme.layout")



@section("slider")
    <!-- Slider -->
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3" data-image="{{ url('img/banner-1.jpg') }}">
      <!-- Firefly -->
      <div class="lec_slider_firefly" data-total="30" data-min="1" data-max="6"></div>
      <!-- Over -->
      <div class="lec_over" data-color="#041a38" data-opacity="0.5"></div>
      <div class="container">
         <!-- Slider Texts -->
         <div class="lec_slide_txt lec_slide_center_middle text-center">
            <img src="{{ url('img/spa-lg-wt-br.png') }}" data-aos-easing="ease" data-aos-delay="300" data-aos="zoom-in" class=" " alt="">
            <img src="{{ url('img/logo.png') }}" data-aos-easing="ease" data-aos-delay="500" data-aos="zoom-in" class="rotate" alt="">
            <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Choice of Confidence</div>
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

@section("content")

        <!-- Content -->
        <section id="lec_content" class="lec_content">
            <!-- section -->
            <section class="lec_section lec_section_no_overlay">
               <div class="lec_over" data-color="#e84e0e" data-opacity="0.05"></div>
               <!-- Over -->
               <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
               <div class="container  ">
                  <div class="row">
                     <div class="col-md-10 lec_animation_block" data-bottom-top="transform:translate3d(0px, 80px, 0px)" data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                        <img src="{{ url('img/about.jpg') }}" alt="">
                     </div>
                     <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                        <!-- Over -->
                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                           <h2 class="sectionhead">S P A WORLD</h2>
                           <p><b>SPA WORLD</b> is a specialist importer and distributor of essential oils, carriers oils, massage oils, herbal massage compress, disposable underwear, scrubs ,accessories and many more products.
                              Our product range includes <b>100% Pure</b> Essential Oils Organic Oils, Ayurveda, Well being products and much more.
                              We carry a wide range of Lemongrass, Lavender oil, Sweet orange and other aromatherapy products.
                           </p>
                           <a href="#ourproducts" class="btn">View Our Catering Menu <i class="ti ti-angle-double-down"></i></a>
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
                  @php($count=0)
                  @foreach($pdtcatg as $pcatg)
                     @if ($count & 1)
                        <!-- First row  -->
                        <div class="row row_mb_100 text-left">
                           <div class="col-md-9 lec_animation_block" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                              <img src="{{ url('storage/pdtcatg/'.$pcatg->image) }}" alt="{{ $pcatg->catg_name }}">
                           </div>
                           <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                              <!-- Over -->
                              <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                              <div class="lec_parallax_menu lec_image_bck lec_fixed">
                                 <h2 class="product_heads">{{ $pcatg->catg_name  }}</h2>
                                 <p class="product_details">
                                    {{ $pcatg->short_description  }}
                                 </p>
                                 <a href="{{ route('showproductcatg', $pcatg->url_slug) }}" class="btn more_prd_info">Read More</a>
                              </div>
                           </div>
                        </div>
                        <!-- row end -->
                     @else
                        <!-- Second Row -->
                        <div class="row row_mb_100 text-left">
                           <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posl lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, -80px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                              <!-- Over -->
                              <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                              <div class="lec_parallax_menu lec_image_bck lec_fixed">
                                 <h2 class="product_heads">{{ $pcatg->catg_name  }}</h2>
                                 <p class="product_details">
                                 {{ $pcatg->short_description  }}
                                 </p>
                                 <a href="{{ route('showproductcatg', $pcatg->url_slug) }}" class="btn more_prd_info">Read More</a>
                              </div>
                           </div>
                           <div class="col-md-8 col-md-offset-4 lec_animation_block" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 80px, 0px)">
                              <img src="{{ url('storage/pdtcatg/'.$pcatg->image) }}" alt="{{ $pcatg->catg_name }}">
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
               <!-- Over -->
               <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
               <div class="container-fluid text-center">
                  <h2 class="sectionhead">S P A WORLD</h2>
                  <h3 class="lec_gold_subtitle">Our product range includes Spa Products, Hotel Supplies and much more.</h3>
                  <div class="lec_slider_single lec_lm_type_i" data-dots="true" data-autoplay="true">
                     
                     @foreach($pdtsubcatg as $subcatg)
                        <div class="lec_lm_type_i_item">
                           <img src="{{ url('storage/pdtsubcatg/'.$subcatg->image) }}" alt="{{ $subcatg->sub_catg_name  }}">
                           <div class="lec_lm_type_i_item_desc lec_image_bck text-left" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, -50px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                              <!-- Over -->
                              <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                              <div class="lec_lm_type_i_item_desc_cont">
                                 <h3 class="lec_goldd">{{ $subcatg->sub_catg_name  }}</h3>
                                 <!-- <div class="lec_lm_type_i_item_price">$13</div> -->
                                 <p> </p>
                              </div>
                           </div>
                        </div>
                     @endforeach

                  </div>
                  <!-- slider end -->
               </div>
               <!-- container end -->
            </section>
            <!-- section end -->
            <!-- section -->
            <section class="lec_section">
               <!-- Over -->
               <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
               <div class="container text-center">
                  <h2 class="lec_gold lec_title_counter">Shop</h2>
                  <h3 class="lec_gold_subtitle">Our Product</h3>
                  <div class="row lec_simple_shop">
                     @foreach($products as $product)
                        <div class="col-md-3">
                           <a href="#contact" class="lec_simple_shop_item">
                           <img src="{{ url('storage/products/'.$product->image1) }}" alt="{{ $product->product_name }}">
                           <b>{{ $product->product_name }}</b>
                           </a>
                        </div>
                     @endforeach
                  </div>
                  </div>
                  <!-- row end -->
               </div>
               <!-- container end -->
            </section>
            <!-- section end -->



@endsection
@section("footerscript")

@endsection