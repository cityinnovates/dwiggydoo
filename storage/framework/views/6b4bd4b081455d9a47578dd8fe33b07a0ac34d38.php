<?php if($message = Session::get('success')): ?>
 <div class="alert alert-success" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>

  

<?php if($message = Session::get('error')): ?>
 <div class="alert alert-danger" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>

   

<?php if($message = Session::get('warning')): ?>
 <div class="alert alert-warning" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>

   

<?php if($message = Session::get('info')): ?>
 <div class="alert alert-info" role="alert"><?php echo e($message); ?></div>
<?php endif; ?>

  

<?php if($errors->any()): ?>
 <div class="alert alert-danger" role="alert"><strong>Something Wrong! </strong> Please try again.</div>
<?php endif; ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/alert-msg.blade.php ENDPATH**/ ?>