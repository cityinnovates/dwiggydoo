<div class="sidebar-sidebar">
<div class="segment-segment">
    <div class=""></div><a href="<?php echo e(route('dashboard')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['dashboard'])); ?>">
        Overview
    </a>
</div>
<div class="segment-segment">
    <div class="segment-heading">PROFILE</div>
    <a href="<?php echo e(route('account')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['account'])); ?>">Your Account</a>
    <a href="<?php echo e(route('user_plan')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user_plan'])); ?>">Your Plan</a>
    <a href="<?php echo e(route('user.connections_list')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.connections_list'])); ?>">Connections</a>
    <a href="<?php echo e(route('all_request')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['all_request'])); ?>">Request</a>
    <a href="<?php echo e(route('profession.show', Auth::user()->id)); ?>" target="_blank" class="segment-link <?php echo e(userAreActiveRoutes(['profession.show'])); ?>">Profession Details</a>
    <a href="<?php echo e(route('user.address')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.address'])); ?>">Address</a>
    <a href="<?php echo e(route('user.order')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.order'])); ?>">Order</a>
</div>
<div class="segment-segment">
    <div class="segment-heading">DOG PROFILE</div>
   <!--  <a href="<?php echo e(route('dog.account')); ?>" class="segment-link <?php if(!isset($_GET['id'])){ ?> <?php echo e(userAreActiveRoutes(['dog.account'])); ?> <?php } ?>">All Dogs</a> -->
    <?php
        $dog_acc = App\Product::where(['user_id'=>Auth::user()->id])->first();
        if($dog_acc != ''){
    ?>
        <a href="<?php echo e(route('dog.account')); ?>?id=<?php echo e($dog_acc->id); ?>" class="segment-link <?php if(isset($_GET['id'])){ if($dog_acc->id == $_GET['id']){ echo 'segment-activeLink'; } }?>" target="_blank"><?php echo e($dog_acc->name); ?></a>

    <?php }else{ ?>
  
	<a href="<?php echo e(route('dog.account')); ?>?id=new" class="segment-link  <?php if(isset($_GET['id'])){ if($_GET['id'] == 'new'){ echo 'segment-activeLink'; } }?>">Add New</a>
	
  <?php } ?>
</div>
    <div class="segment-segment">
        <div class="segment-heading">CREDITS</div>
            <a href="<?php echo e(route('user_coupons')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user_coupons'])); ?>">Coupons</a>
            <a href="<?php echo e(route('redeem')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['redeem'])); ?>">Redeem</a>
    </div>
    <div class="segment-segment">
        <div class="segment-heading">NOTIFICATION</div>
        <a href="<?php echo e(route('notification')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['notification'])); ?>">Notification</a>
        <a href="<?php echo e(route('user.setting')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.setting'])); ?>">Setting</a>
    </div>
    <div class="segment-segment">
        <div class="segment-heading">LEGAL</div><a href="<?php echo e(route('user.privacy_policy')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.privacy_policy'])); ?>">
            Privacy Policy
        </a>
        <a href="<?php echo e(route('user.terms_of_uses')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.terms_of_uses'])); ?>">
            Terms of uses
        </a>
        <a href="<?php echo e(route('user.help_support')); ?>" class="segment-link <?php echo e(userAreActiveRoutes(['user.help_support'])); ?>">
            Help & Support
        </a>
    </div>
    <div class="segment-segment">
        <div class="dashboard-logoutButton"><a href="<?php echo e(route('logout')); ?>">Logout</a></div>
    </div>
</div>

<?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/inc/user_side_nav.blade.php ENDPATH**/ ?>