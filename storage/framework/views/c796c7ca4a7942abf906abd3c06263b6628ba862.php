<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
        	<?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
              <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="contentforprof2" >
                 <input type="radio" name="address_id" onclick="set_default_address(<?php echo e($address->id); ?>);" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?> checked <?php endif; ?> required>

                <div class="contererw">
                  <div class="namefordas">
                    <p><b><?php echo e($address->country); ?></b></p>

                  </div>
                  <div class="adddre">
                    <p><?php echo e($address->city); ?>, <?php echo e($address->address); ?>, <?php echo e($address->postal_code); ?></p>
                  </div>
                  <div class="phoneforadd">
                    <p>Mobile: <?php echo e($address->phone); ?></p>
                  </div>
                </div>  <br>
                <div class="row" style="border-top: 1px solid rgb(202, 198, 198);">
                  <div class="col d-flex justify-content-center"style="border-right: 1px solid rgb(202, 198, 198);"><a style="color: #58bed7; margin: 10px;"  data-toggle="modal" data-target="#editAddressModels<?=$key?>"><b>EDIT</b></a></div>
                  <div class="col d-flex justify-content-center"><a style="color: #58bed7; margin: 10px;" onclick="delete_alert(<?php echo e($address->id); ?>)"><b>Remove</b></a></div>
                </div>  
              </div><br>

              <!-- Modal -->
              <div class="modal fade" id="editAddressModels<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="addressModelsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editAddressModelsTitle<?=$key?>">Edit Address</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         
                          <form class="form-default" id="address_form" role="form" action="<?php echo e(route('addresses.update')); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="id" value="<?php echo e($address->id); ?>">
                              <div class="modal-body">
                                  <div class="p-3">
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label><?php echo e(translate('Address')); ?></label>
                                          </div>
                                          <div class="col-md-10">
                                              <textarea class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Your Address')); ?>" rows="1" name="address" required><?php echo e($address->address); ?></textarea>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label><?php echo e(translate('Country')); ?></label>
                                          </div>
                                          <div class="col-md-10">
                                              <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
                                                  <?php $__currentLoopData = \App\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($country->name); ?>" <?= $country->name == $address->country ? 'selected' : ''; ?>><?php echo e($country->name); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label><?php echo e(translate('City')); ?></label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your City')); ?>" name="city" value="<?php echo e($address->city); ?>" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label><?php echo e(translate('Postal code')); ?></label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your Postal Code')); ?>" name="postal_code" value="<?php echo e($address->postal_code); ?>" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label><?php echo e(translate('Phone')); ?></label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('+(91)')); ?>" name="phone" value="<?php echo e($address->phone); ?>" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-9"></div>
                                          <div class="col-md-3">
                                             <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                    </div>
                  </div>
                </div>
              </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-12 text-center"><br>
                <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="color: white; border-radius: 10px;" data-toggle="modal" data-target="#addressModels"> + Add New Address</button>
              </div>
    		</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<!-- Modal -->
<div class="modal fade" id="addressModels" tabindex="-1" role="dialog" aria-labelledby="addressModelsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModelsTitle">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
            <form class="form-default" role="form" action="<?php echo e(route('addresses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Address')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Your Address')); ?>" rows="1" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Country')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
                                    <?php $__currentLoopData = \App\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your City')); ?>" name="city" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Postal code')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your Postal Code')); ?>" name="postal_code" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Phone')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('+(91)')); ?>" name="phone" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                               <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_script'); ?>

<script type="text/javascript">
  function delete_alert(id){
    if (confirm("Are you sure?")) {
        window.location.href = "<?php echo e(route('home')); ?>/addresses/destroy/" + id;
    }
    return false;
  }
  function set_default_address(id){
    if (confirm("Are you sure?")) {
        window.location.href = "<?php echo e(route('home')); ?>/addresses/set_default/" + id;
    }
    return false;
  }
  function edit_address(id){
    $('#address_form')[0].reset();
    $.ajax({
      url: "<?php echo e(route('home')); ?>/addresses/edit/" + id,
      type: "GET",
      data: { id: id},
      success: function(data){

        var keys = $.parseJSON(data);
        $.each(keys, function(key, value){
            $('input[name="id"]').val(value.id);
            $('input[name="country"]').val(value.country);
            $('input[name="city"]').val(value.city);
            $('input[name="address"]').val(value.address);
            $('input[name="postal_code"]').val(value.postal_code);
            $('input[name="phone"]').val(value.phone);
        });
      }
    });
    $('#editAddressModels').modal('show');
  }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_address.blade.php ENDPATH**/ ?>