<div class="row" style="border-bottom: 1px solid #d4d5d9;">
    <div class="col col-lg-2 acntt">
        <p style="font-size: 22px;  padding: 20px;"> Account</p>
    </div>
    <div class="col">
         <?php if(Auth::user()->avatar_original != null): ?>
            <img src="<?php echo e(Auth::user()->avatar_original); ?>" class="image rounded-circle proimgr">
        <?php else: ?>
            <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="image rounded-circle proimgr">
        <?php endif; ?>
        <?php if(Auth::user()->name != null  && (Auth::user()->location_id !=0)): ?>
        <?php 
           $location = DB::table('city')->where('id', Auth::user()->location_id)->first();

           
        ?>
        <div class="namee"><?php echo e(Auth::user()->name); ?><br>
            <span style="font-size: 13px;"><?php echo e($location->name); ?></span>
        </div>
        <?php endif; ?>
        <?php
            $red_points = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'cr')->get()->sum('reward_point');
        ?>
        <?php if($red_points > 0): ?>
        <div class="rewardpointcnt">
            <i class="fa-solid fa-coins"></i> <b><?php echo e($red_points); ?></b>
            <br><p>Redeemable Points</p>
        </div>
        <?php else: ?>
        <div class="rewardpointcnt">
            <i class="fa-solid fa-coins"></i> <b>0</b>
            <br><p>Redeemable Points</p>
        </div>

        <?php endif; ?>
    </div>
</div> <?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/inc/user_top_bar.blade.php ENDPATH**/ ?>