<?php if(auth()->guard()->check()): ?>
 <?php if(Auth::user()->user_type == 'customer'): ?>
  <div class="modal fade" id="rewardpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="border: none;">
           
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="centerele d-flex justify-content-center">
            <?php if(Auth::user()->avatar_original != null): ?>
                <img src="<?php echo e(Auth::user()->avatar_original); ?>" class="image rounded-circle" style="max-width: 150px">
            <?php else: ?>
                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="image rounded-circle" style="max-width: 150px">
            <?php endif; ?>
        
         </div>
         <div class="centerele d-flex justify-content-center">
            <h1 style="color: #F3735F;     font-size: 25px;">Reward Points</h1>
         </div>
         <div class="centerele d-flex justify-content-center">

            <h1 style="color: #000;font-size: 34px;"><b><?= $total_rewards; ?></b></h1>
         </div><br>
         <div class="row">
        <div class="col d-flex justify-content-center"><div style="color: #000; font-size: 34px ;"><b><?= $total_cr; ?></b><div style="color: #F3735F; font-size: 12px ;">Redeem Point</div></div></div>
        <div class="col d-flex justify-content-center"><div class="linegr" style="width: 2px; background-color: #CCCCCC; height: 100px;"></div></div>
        <div class="col"> <div style="color: #000; font-size: 34px ;"><b><?= $total_dr; ?></b><div style="color: #F3735F; font-size: 12px ;">Use Point</div></div></div>
         </div>
         <br>
         <button class="bg-ff bdr-rdius24 bdr-none gothambold-f15" style="background-color:Tomato; color: white;     margin-left: 85px;">Earn More Points</button>
          </div>
         
        </div>
      </div>
    </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/modals/show_rewards_points.blade.php ENDPATH**/ ?>