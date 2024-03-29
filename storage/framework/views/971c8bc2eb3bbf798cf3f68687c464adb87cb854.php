<?php $__env->startSection('content'); ?>

<?php

    $terms =  \App\Page::where('type', 'terms_conditions_page')->first();

?>

<section class="pt-4 mb-4">

    <div class="container text-center">

        <div class="row">

            <div class="col-lg-6 text-center text-lg-left">

                <h1 class="fw-600 h4"><?php echo e($terms->getTranslation('title')); ?></h1>

            </div>

            <div class="col-lg-6">

                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">

                    <li class="breadcrumb-item opacity-50">

                        <a class="text-reset" href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>

                    </li>

                    <li class="text-dark fw-600 breadcrumb-item">

                        <a class="text-reset" href="<?php echo e(route('terms')); ?>">"<?php echo e(translate('Terms & conditions')); ?>"</a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<section class="mb-4">

    <div class="container">

        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">

            <?php

                echo $terms->getTranslation('content');

            ?>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/policies/terms.blade.php ENDPATH**/ ?>