<?php if(auth()->guard()->check()): ?>
<?php if(Auth::user()->user_type == 'customer'): ?>
 <?php @$uid=Auth::user()->id; ?>
<section style="background-color: #1D1D1D;">
  <div class="container">
      <div class="row">
          <?php 

          @$socialss = DB::table('socials')->where('end_time','>=',time())->where('user_id',@$uid)->first(); 
          if(@$socialss->image!=''){   
          
          ?>

            <div class="col col-lg-2 sedf">
              <div class="srtyu" id="backdr" data-toggle="modal" data-target=".rewardpagepop" class="slider-img" onclick="sliderdynamic(<?php echo e(@$uid); ?>)" >
                <img src="<?=@$socialss->image?>" style="border-radius: 50px;" class="statusimhg">
                <div class="nameperson"><?=@$socialss->uploaded_name?></div>
              </div>
            </div>

          <?php  } else {  ?>

            <div class="col col-lg-2 sedf">
              <div class="srtyu" >
                <?php if(Auth::user()->avatar_original != null): ?>
                  <img src="<?php echo e(Auth::user()->avatar_original); ?>" style="border-radius: 50px;">
                <?php else: ?>
                    <img src="<?php echo e(static_asset('images/Ellipse 177.png')); ?>" style="border-radius: 50px;">
                <?php endif; ?>
                <div class="nameperson"><?=@$socialss->uploaded_name?></div>
              </div>
            </div>

          <?php  }  ?>

          <div class="col col-lg-2">
            <?php if(Auth::user()->avatar_original != null): ?>
              <img src="<?php echo e(Auth::user()->avatar_original); ?>" class="sel" style="border-radius: 50px;width: 100px;">
            <?php else: ?>
                <img src="<?php echo e(static_asset('images/Ellipse 177.png')); ?>" class="sel" style="border-radius: 50px;width: 100px;">
            <?php endif; ?>
            <form id="story" method="POST" enctype="multipart/form-data" action="https://dwiggydoo.com/customer_update_social">
              <?php echo csrf_field(); ?>
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
                  <div id="backdr" data-toggle="modal" data-target=".rewardpagepop" class="slider-img" style="border-color: #cdcaca;" onclick="sliderdynamic1(<?php echo e(@$value->user_id); ?>)">
                    <img src="<?=$value->image?>" style="border-radius: 50px;">
                    <div class="nameperson"><?=$value->uploaded_name?></div>
                  </div>

                <?php  }   ?>
              </div>
          </div>
        </div>
    </div>
</section>

<?php endif; ?>
<?php endif; ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/partials/stories.blade.php ENDPATH**/ ?>