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
               <div class=" text-center">
                  <div class="container">
                     <div class="row cond ">

                        @foreach($allblogs as $blog)
                        <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12  cond_hight pt_10">
                           <div class="cook">
                              <div class="cook_imge">
                                 <img src="{{ url('storage/blogs/'.$blog->thump_image) }}" alt="{{ $blog->thump_alt }}" class=" img_cook img-responsive">
                              </div>
                              <span class="lec_news_title lec_gold_subtitle alin_cook">{{ $blog->blog_title  }}</span>
                              <p>{{ $blog->short_description  }}</p>
                              <p><a class="btn" href="{{ route('showblog', $blog->url_slug) }}">Read More <i class="ti ti-angle-double-down"></i></a> </p>
                           </div>
                        </div>
                        @endforeach   
                     </div>
                  </div>
               </div>
            </section>            



@endsection
@section("footerscript")

@endsection