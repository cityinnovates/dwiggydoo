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
                   <form action="<?php echo e(route('user.setting_update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(@$setting->id); ?>">
                    <div class="contentforhelps">
                    <div class="row">
                        <table class="table dfg">
                            <tr>
                                <th scope="col" style="border: none;">Dwiggy Doo Updates</th>
                                <th style="text-align: center; border: none;"><i class="fa-regular fa-envelope"></i>Mail</th>
                                <th style="text-align: center; border: none;"><i class="fa-solid fa-phone"></i> Call</th>

                            </tr>

                            <tbody>
                                <?php $__currentLoopData = \App\Models\UserSettingOption::orderBy('id', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                
                                    <?php  
                                        $check = \App\Models\UserSetting::where('user_id', Auth::user()->id)->where('setting_option', $value->id)->first();
                                        
                                    ?>

                                        <div class="fji"><b><?php echo e($value->title); ?></b><br><br><?php echo e($value->description); ?></div>
                                    </td>
                                    <input type="hidden" name="user_setting_id[]" value="<?php echo e($value->id); ?>">
                                    <?php if($check != null){ ?>

                                        <input type="hidden" name="is_have" value="1">

                                    <?php } ?>
                                    
                                    <td style="text-align: center;">
                                        <input type="checkbox" class="largerCheckbox" name="mail_<?php echo e($value->id); ?>"

                                        <?php
                                        if($check != null){
                                            if($check['is_mail'] == 1){
                                                echo 'value="1" checked'; 
                                            }
                                        }

                                        ?>></td>
                                        
                                        <td style="text-align: center;"> <input type="checkbox" class="largerCheckbox" name="phone_<?php echo e($value->id); ?>"                        
                                        <?php
                                        if($check != null){
                                            if($check['is_phone'] == 1){
                                                echo 'value="1" checked'; 
                                            }
                                        }

                                        ?>></td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 ">
                        <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style=" color: white; border-radius: 10px; float: right;">SAVE CHANGES</button>
                        <div class="cancel" style="float: right;">
                            <a><b>Cancle</b></a>
                        </div>
                        <br>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_setting.blade.php ENDPATH**/ ?>