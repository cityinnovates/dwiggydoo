<section class="footer_top_sec pt-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2 class="dd_head f-28  f-bold mb-4 membrtrsy" style="color: black;"> Members & Their Sayings</h2>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <?php $i=0;  ?>
            @php $home_testimonial = json_decode(get_setting('home_testimonial_heading'), true);  @endphp
            @foreach ($home_testimonial as $key => $value)
            <div class="carousel-item <?php if($i==0){  ?> active<?php }  ?>">
              <div class="pos-rel">
                <span class=" f-40"><i class="fas fa-quote-left" style="margin-top: 50px;"></i></span>
                <p class="f-18 f-medium ">{{ json_decode(get_setting('home_testimonial_description'), true)[$key] }}</p>
              </div>
              <div class="about_say d-flex align-items-center pt-4">
                <div class="about_say_img"><img src="{{ route('home') }}/images/new_xd_images/Samantha.png"></div>
                <div class="about_say_cnt ml-3">
                  <strong class="d-block  f-18 f-sbold">{{ json_decode(get_setting('home_testimonial_name'), true)[$key] }}</strong>
                  <small class="d-block ">{{ json_decode(get_setting('home_testimonial_location'), true)[$key] }}</small>
                </div>
              </div>
            </div>
            <?php $i++;  ?>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-left-long " style="color: black;"></i></span>
            <span class="sr-only ">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-right-long" style="color: black;"></i></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
      </div> 
      <div class="col">
        <img src="{{ route('home') }}/images/only-dog.png" alt="">
      </div>
    </div>
  </div>
  <br id="res">
  <br id="res"><br id="res"><br id="res">
</section>