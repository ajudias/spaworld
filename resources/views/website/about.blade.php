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
            <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">About us</div>
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
        <section id="lec_content" class="lec_content" >
            <section class="lec_section lec_section_no_overlay" style="height:900px">
               <div class="lec_over" data-color="#e84e0e" data-opacity="0.05"></div>
               <!-- Over -->
               <div class="lec_over" data-color="#333" data-opacity="0.05"></div>
               <div class="container  ">
                  <div class="row">
                     <div class="col-md-5 lec_animation_block" data-bottom-top="transform:translate3d(0px, 80px, 0px)" data-top-bottom="transform:translate3d(0px, -80px, 0px)">
                        <img src="{{ url('img/about.jpg') }}" alt="">
                     </div>
                     <div class="col-md-7 lec_animation_block lec_animation_abs_block lec_posr lec_image_bck" data-bottom-top="transform:translate3d(0px, 0px, 0px)" data-top-bottom="transform:translate3d(0px, 80px, 0px)" data-image="{{ url('images/main_back.jpg') }}">
                        <!-- Over -->
                        <div class="lec_over" data-color="#013780" data-opacity="0.05"></div>
                        <div class="lec_parallax_menu lec_image_bck lec_fixed">
                           <h2 class="sectionhead">WHO WE ARE</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vobis voluptatum perceptarum recordatio vitam beatam facit, et quidem corpore perceptarum. Quid autem habent admirationis, cum prope accesseris? Duo Reges: constructio interrete. Dicet pro me ipsa virtus nec dubitabit isti vestro beato M. Ne vitationem quidem doloris ipsam per se quisquam in rebus expetendis putavit, nisi etiam evitare posset. Quippe: habes enim a rhetoribus;
                            </p>
                            <p>
                                Solum praeterea formosum, solum liberum, solum civem, stultost; Aliter enim explicari, quod quaeritur, non potest. An eiusdem modi? Et quidem illud ipsum non nimium probo et tantum patior, philosophum loqui de cupiditatibus finiendis. Ait enim se, si uratur, Quam hoc suave! dicturum. Animi enim quoque dolores percipiet omnibus partibus maiores quam corporis. Quorum altera prosunt, nocent altera. Si longus, levis dictata sunt.
                            </p>
                            
                           <a href="#contact" class="btn">Contact us <i class="ti ti-angle-double-down"></i></a>
                        </div>
                     </div>
                  </div>
                  <!-- row end -->
               </div>
               <!-- container end -->
            </section>          



@endsection
@section("footerscript")

@endsection