@auth
@if(Auth::user()->user_type == 'customer')
 <?php @$uid=Auth::user()->id; ?>
<section style="background-color: #1D1D1D;">
  <div class="container">
      <div class="row">
          <?php 

          @$socialss = DB::table('socials')->where('end_time','>=',time())->where('user_id',@$uid)->first(); 
          if(@$socialss->image!=''){   
          
          ?>

            <div class="col col-lg-2 sedf">
              <div class="srtyu" id="backdr" data-toggle="modal" data-target=".rewardpagepop" class="slider-img" onclick="sliderdynamic({{@$uid}})" >
                <img src="<?=@$socialss->image?>" style="border-radius: 50px;" class="statusimhg">
                <div class="nameperson"><?=@$socialss->uploaded_name?></div>
              </div>
            </div>

          <?php  } else {  ?>

            <div class="col col-lg-2 sedf">
              <div class="srtyu" >
                @if (Auth::user()->avatar_original != null)
                  <img src="{{ Auth::user()->avatar_original }}" style="border-radius: 50px;">
                @else
                    <img src="{{ static_asset('images/Ellipse 177.png') }}" style="border-radius: 50px;">
                @endif
                <div class="nameperson"><?=@$socialss->uploaded_name?></div>
              </div>
            </div>

          <?php  }  ?>

          <div class="col col-lg-2">
            @if (Auth::user()->avatar_original != null)
              <img src="{{ Auth::user()->avatar_original }}" class="sel" style="border-radius: 50px;width: 100px;">
            @else
                <img src="{{ static_asset('images/Ellipse 177.png') }}" class="sel" style="border-radius: 50px;width: 100px;">
            @endif
            <form id="story" method="POST" enctype="multipart/form-data" action="https://dwiggydoo.com/customer_update_social">
              @csrf
              <div class="image-upload" style="margin-top: -29px;">
                <label for="file-input">
                  <a class="add"><span class="">+</span></a>
                  </label>
                  <input id="file-input" type="file" name="myfile" accept="image/*"   onchange="filesubmit();" />
                </div>
                <input type="submit" id="foo"  style="display: none;" name="submit"  >
              </form>
              <script type="text/javascript">
                function filesubmit(){
                  alert("uploaded");
                  $( "#foo" ).trigger( "click" );
                }
              </script>
              <div class="nameperson">Create Stories</div>
          </div>

          <div class="col-8">
              <div class="slider-rewards ">

                  <?php 
                    @$socials = DB::table('socials')->where('end_time','>=',time())->where('user_id','!=',@$uid)->groupby('user_id')->get(); 
                    foreach (@$socials as $key => $value) {
                  ?>
                  <div id="backdr" data-toggle="modal" data-target=".rewardpagepop" class="slider-img" style="border-color: #cdcaca;" onclick="sliderdynamic1({{@$value->user_id}})">
                    <img src="<?=$value->image?>" style="border-radius: 50px;">
                    <div class="nameperson"><?=$value->uploaded_name?></div>
                  </div>

                <?php  }   ?>
              </div>
          </div>
        </div>
    </div>
</section>

@endif
@endauth