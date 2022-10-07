<?php $__env->startSection('content'); ?>
    <div class="container pt-4">
	<section>
    <div class="row contact">
      <div class="col-md-4 col-12 p-3">
        <h4>Keep In Touch</h4>
      </div>
      <div class="col-md-8 col-12 p-3">
        <h4>Contact Us</h4>
        <form action="" method="post">
         <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" >
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" >
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="form-control" >
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="red-btn mt-4">Submit</button>
      </form>
    </div>
  </div>

</section>
</div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/contactus.blade.php ENDPATH**/ ?>