@extends("website.theme.layout")

@section("mystyles")
<style>
.lec_slider {
    height: 50vh;
}
.lec_section .container {
    padding-top: 45px;
    font-size: 18px;
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
            <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Blogs</div>
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
            <section class="lec_section lec_section_no_overlay lec_image_bck lec_image_bck_no_cover">
               <div class=" text-justify">
                  <div class="container">
                  <h2 class="sectionhead">{{ $thisblog->blog_title  }}</h2>
                  {!! $thisblog->blog_content  !!}
                  </div>
               </div>
            </section>            



@endsection
@section("footerscript")

@endsection