<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">
<style type="text/css">
    .iconDetails{border-radius: 50px;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
              <br>
                <div class="row">
                    <div class="col">
                        <p><b>Pawsitive Conversations</b></p>
                    </div>
                    <div class="col">
                        <div class=" d-flex " style="float: right;">
                            <label class="f-15 gotham-medium mb-0 color-70">Sort by &nbsp; &nbsp; </label> 
                            <form id="filter-form" method="get" action=""> 
                                <select class="form-control srch-form px-4 bdr-rdius24 gotham-book" style="margin-top: -10px;" name="sort_by" onchange="filter()">
                                     <option value="newest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>

                                    <option value="oldest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>

                                    <option value="block" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'block'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Blocked list')); ?></option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <br>

                <?php 
                
                if(count($product1) > 0){
                foreach ($product1 as $key => $value) {
                        
                    $wishlist = DB::table('dog_wishlists')->where('user_id', Auth::user()->id)->where('dog_id', $value->id)->first();

                    $owner_profile = DB::table('users')->where('id', $value->user_id)->first();
                ?>

                <?php 

                $breed = DB::table('breed')->where([['id', '=', $value->brand_id]])->first();
                $location_id = DB::table('city')->where([['id', '=', $value->location_id]])->first();
                $categories = DB::table('categories')->where([['id', '=', $value->category_id]])->first();

                ?>

                <div class="row ">
                    <div class="col">
                        <div>

                            <?php   if($value->file_path!=''){ ?>

                            <?php   $fgf=explode('.',$value->file_path); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
                            <img src="<?php echo e($value->file_path); ?>" class='iconDetails'>    
                                
                         
                            <?php  } else {   ?>
                               <img src="images/video_dummy_icon.jpg" class='iconDetails'>             
                            <?php }  }   else {   ?>

                            <img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class='iconDetails'>
                            <?php  }   ?>
                        </div>
                        <div style='margin-left:100px; margin-top: 10px;'>
                            <p><b><?php echo e(@$value->name.$value->id); ?></b> <img src="<?= $owner_profile->avatar_original != null ? $owner_profile->avatar_original : route('home').'/images/beagle.png';?>" style="height: 22px;width: 22px;border-radius: 50px;"> </p>
                            <div style="font-size:10px;">Breed: <b><?php echo e(optional($breed)->name); ?></b> | Cat: <b><?php echo e(optional($categories)->name); ?></b> | <b><?php if($value->unit==0){ echo "Male"; }else { echo "Female"; } ?></b> | <b><?php echo e(optional($location_id)->name); ?></b></div>

                        </div>
                    </div>
                    <div class="col ludo">
                        <div class="col-md-12 text-center">
                            <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 chess d-none"> Message</button><br><br>
                        </div>
                        <div class="act_frnd text-right">
                            <div class="act_frnd_bar text-right" id="doneit"><i class="fas fa-ellipsis-h"></i></div>
                            <ul class="act_frnd_list mb-0" style="bottom: -70px;">
                                <li><a href="<?php echo e(route('connections_unfriend', $value->id)); ?>"><button  class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/sad.png"> <span class="w-50 text-left pl-4">Unfriend</span></button></a></li>
                                <li><a href="<?php echo e(route('connections_block', $value->id)); ?>"><button class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/cry.png"> <span class="w-50 text-left pl-4">Block</span></button></a></li>
                                <li><a href="<?php echo e(route('connections_report', $value->id)); ?>"><button class="d-flex justify-content-center  gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/dead.png"> <span class="w-50 text-left pl-4">Report</span></button></a></li>
                            </ul>
                            
                        </div>

                        
                    </div>
                </div>

                 <?php } ?>
                 <div class="row">
                      <div class="col-12"><div class="float-right"><?php echo e($product1->links()); ?></div></div>
                 </div>
                <hr style="margin-left: 55px;">
                <br>

                <?php }else{ ?>

                    <div class="row">
                        <div class="col-12 mb-5">
                        <div class="text-center mb-4 f-Montserrat" style="font-family: 'Pacifico', cursive; font-size: 81px; color: black;">Oh Oh !</div>
                            <div class="text-center mb-4"><img src="<?php echo e(route('home')); ?>/images/shutterstock_1610553859-removebg-preview.png" class="img-fluid"></div>
                            
                                <p class="color-00 text-center f-35 f-bold">Make Friends!</p>
                        </div>
                    </div>

                <?php } ?>






                <div class="row" style="margin: 20px;">
                    <div class="col">
                        <p><b>Pawfect Profiles</b></p>
                    </div>
                    <div class="col"><a href="<?php echo e(url('https://dwiggydoo.com/all-connections')); ?>" style="float: right;"><b>See All</b></a></div>
                </div>
                <div class="row">
                    <?php 

                    foreach ($products as $key => $products){
                        $owner_profile = DB::table('users')->where('id', $products->user_id)->first();
                    ?>  
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="bl_Convers">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="bl_Convers_img pos-rel">
                                    <?php

                                        if($products->file_path!=''){ 
                                        $fgf=explode('.',$products->file_path); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {
                                        ?>

                                        <img style="width: 100%;height: 200px;object-fit: cover;" src="<?php echo e($products->file_path); ?>">

                                      <?php  } else {   ?>

                                           <video style="width: 100%;height: 200px; border-radius: 50%;object-fit: cover;" controls>
                                           <source src="<?php echo e($products->file_path); ?>" type="video/mp4">
                                           Your browser does not support the video tag.
                                          </video>

                                      <?php }    ?>
                                    <?php  }  else { ?>
                                        <img style="width: 100%; height: 200px;object-fit: cover;" src="https://dwiggydoo.com/images/No_image_available.svg.webp">
                                    <?php  }   ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <style type="text/css">
                                        .bl_Convers_cnt.items_<?= $key ?> >strong:first-child:after {background: url(<?= $owner_profile->avatar_original != null ? $owner_profile->avatar_original : route('home').'/images/beagle.png';?>) 0 0 no-repeat; border-radius: 50px; height: 25px; width: 25px;margin-top: 5px}
                                    </style>
                                    <div class="bl_Convers_cnt items_<?= $key ?>">
                                        <strong class="f-15 f-sbold color-00 mb-2">Name goes here </strong>
                                        <p class="f-8 njni f-reg color-brown"><span>Breed</span> <b class="f-sbold">Golden R</b> </p>
                                        <p class="f-8 njni f-reg color-brown"><span>Gender</span> <b class="f-sbold">Male </b> </p>
                                        <p class="f-8 njni f-reg color-brown"><span>Location</span> <b class="f-sbold">Gurugram (3 KM Away)</b> </p>
                                        <div class="bl_Convers_chat mt-3">
                                            <?php

                                            $requests = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$products->id)->where('status','0')->count();
                                            $requestsv = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$products->id)->where('status','1')->count();
                                            if($requestsv>0){   ?>

                                                <button type="button" class="gotham-medium f-20 twtyfnt color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i class="fas fa-user-plus"></i> Send Request</button>

                                            <?php } else if($requests>0){   ?>

                                                <button type="button" class="gotham-medium f-20 twtyfnt color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i class="fas fa-user-plus"></i>Request sent</button>

                                            <?php } else { ?> 

                                                <a <?php if(@isset(Auth::user()->id)){?> href="https://dwiggydoo.com/send_request/<?php echo e($products->id); ?>"  <?php  } else {  ?> data-toggle="modal" data-target="#staticBackdrop" <?php  }  ?>>   <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i> Send Request</button></a>      
                                                    
                                            <?php  }  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  }  ?>  
                 <div class="row">
                 </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_script'); ?>
    <script type="text/javascript">
        function filter(){
            $('#filter-form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_connections_list.blade.php ENDPATH**/ ?>