<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6"><?php echo e(translate('Question')); ?></h5>
</div>

<div class="col-lg-12 mx-auto">
    <div class="card">
        <div class="card-body p-0">

            <form class="p-4" action="<?php echo e(route('reward_questions.update', $rQuestions->id)); ?>" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-from-label" for="name"><?php echo e(translate('Name')); ?> <i class="las la-language text-danger" title="<?php echo e(translate('Translatable')); ?>"></i></label>
                    <div class="col-sm-12">
                        <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="question" value="<?php echo e($rQuestions->question); ?>" class="form-control" required>
                    </div>
                </div>
                   <div class="form-group">
                        <label><?php echo e(translate('Option')); ?></label>
                        <div class="option-target">
                            <?php if(!empty($rQuestions->option)): ?>
                                <?php $__currentLoopData = json_decode($rQuestions->option); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row gutters-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Option" name="option[]" value="<?php echo e($value); ?>">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                            <i class="las la-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <button
                            type="button"
                            class="btn btn-soft-secondary btn-sm"
                            data-toggle="add-more"
                            data-content='
                            <div class="row gutters-5">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Option" name="option[]">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                        <i class="las la-times"></i>
                                    </button>
                                </div>
                            </div>'
                            data-target=".option-target">
                            <?php echo e(translate('Add New')); ?>

                        </button>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Answer')); ?></label>
                        <select name="answer" class="form-control" required>
                            <option selected disabled>Select Answer</option>
                            <option value="0" <?= $rQuestions->answer == 0 ? 'selected': ''; ?>>1st</option>
                            <option value="1" <?= $rQuestions->answer == 1 ? 'selected': ''; ?>>2nd</option>
                            <option value="2" <?= $rQuestions->answer == 2 ? 'selected': ''; ?>>3rd</option>
                            <option value="3" <?= $rQuestions->answer == 3 ? 'selected': ''; ?>>4th</option>
                            <option value="4" <?= $rQuestions->answer == 4 ? 'selected': ''; ?>>5th</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Type')); ?></label>
                        <select name="type" class="form-control" required disabled>
                            <option selected disabled>Select type</option>
                            <?php $__currentLoopData = DB::table('reward_questions_type')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?= $rQuestions->type == $value->id ? 'selected': ''; ?>><?php echo e($value->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Publish Date')); ?></label>
                         <input type="date" class="form-control"  name="published_date" placeholder="<?php echo e(translate('Publish Date')); ?>" data-format="DD-MM-Y"data-advanced-range="false" autocomplete="off" required value="<?php echo e($rQuestions->published_date); ?>">
                    </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/reward/edit.blade.php ENDPATH**/ ?>