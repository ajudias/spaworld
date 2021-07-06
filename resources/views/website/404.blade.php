@extends("website.theme.layout")
@section("mystyles")
<style>
.lec_slider {
    height: 50vh;
}
.lec_section .container {
    padding-top: 45px;
}
</style>
@endsection
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
            <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Page Not Found</div>
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
                        <img src="{{ url('img/404.jpg') }}" alt="">
                     </div>
                     <div class="col-md-5 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                        <!-- Over -->
                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                           <h2 class="sectionhead">S P A WORLD</h2>
                           <p><b>SORRY !!</b> The Page you requested is not found.
                           </p>
                           <a href="/home" class="btn">View Our Home Page <i class="ti ti-angle-double-down"></i></a>
                        </div>
                     </div>
                  </div>
                  <!-- row end -->
               </div>
               <!-- container end -->
            </section>
        </section>
        <!-- section end -->

@endsection
@section("footerscript")

@endsection