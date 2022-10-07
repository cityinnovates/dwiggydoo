  @if (get_setting('home_footer_images') != null)

  <section style="margin-top: 100px">
    <div class="container" id="res" style="margin-top: -100px; position: absolute; margin-left: 100px;">
      <div class="row">
        @foreach (json_decode(get_setting('home_footer_images'), true) as $key => $value)
        <div class="col"><img src="{{ uploaded_asset(json_decode(get_setting('home_footer_images'), true)[$key]) }}" alt=""></div>
        @endforeach
      </div>
    </div>
  </section>

  @endif

<footer class="pt-1">
  <div class="footer py-5"> 
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
         <h4 class="mb-2 pb-1 " style="color: white">Customer Service</h4>
         <ul class="list-unstyled quick_linkks mb-0">
          <li><a href="{{ route('contact-us') }}" class="nav-link" style="color: white">Contact Us</a></li>
          <li><a href="{{ route('term') }}" class="nav-link" style="color: white">Terms</a></li>
          <li><a href="{{ route('privacy') }}" class="nav-link" style="color: white">Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h4 class="mb-2 pb-1 " style="color: white"> Corporate</h4>
        <ul class="list-unstyled quick_linkks mb-0">
         <li><a href="{{ route('aboutus') }}" class="nav-link" style="color: white ;" >About Us</a></li>
         <li><a href="{{ route('plans.plan_lists') }}" class="nav-link" style="color: white">Subscription</a></li>

       </ul>
     </div>
    <div class="col-md-4 mb-4">
      <h4 class="mb-2 pb-1 " style="color: white">Keep In Touch</h4>
      <div class="footer-contact"> 
        <p style="color: white">Email : <a href="#" style="color: white"> Info@dwiggydoo.com</a></p>
        <div class="dd_social_icons">
            <!-- <img src="images/icons/Group_90.svg"> -->
            @if ( get_setting('facebook_link') !=  null )
            <a href="{{ get_setting('facebook_link') }}" style="display: inline-block;margin-right: 10px"><img src="{{ route('home')}}/images/icons/facbook.png"></a>
            @endif

            @if ( get_setting('twitter_link') !=  null )
            <a href="{{ get_setting('twitter_link') }}" style="display: inline-block;margin-right: 10px"><img src="{{ route('home')}}/images/icons/twitter.png"></a>
            @endif

            @if ( get_setting('instagram_link') !=  null )
            <a href="{{ get_setting('instagram_link') }}" style="display: inline-block;margin-right: 10px"><img src="{{ route('home')}}/images/icons/instagram.png"></a>
            @endif

            @if ( get_setting('youtube_link') !=  null )
            <a href="{{ get_setting('youtube_link') }}" style="display: inline-block;margin-right: 10px"><img src="{{ route('home')}}/images/icons/youtube.png"></a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="copyright text-white text-center p-2">
  <div class="container">
    <div class="copyrihgt-text">
     @php
        echo get_setting('frontend_copyright_text');
    @endphp
   </div>
 </div>
</div>
</footer>
