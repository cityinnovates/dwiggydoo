<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3"><?php echo e(translate('Edit Profession')); ?></h1>
		</div>
	</div>
</div>
<div class="card">

	<form class="p-4" action="<?php echo e(route('profession.update')); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<input type="hidden" name="_method" value="PATCH">
		<input type="hidden" name="id" value="<?php echo e($profession->id); ?>">

	  <h6 class="fw-600 mb-0"><?php echo e(translate('Profession Content')); ?></h6>
		<hr>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Title')); ?> <span class="text-danger">*</span> <i class="las la-language text-danger" title="<?php echo e(translate('Translatable')); ?>"></i></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo e($profession->title); ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="category">Profession <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select name="category" class="form-control">
						<?php $__currentLoopData = App\Models\ProfessionCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($value->id); ?>" <?= $value->id == $profession->category ? 'selected' : '' ;?>><?php echo e($value->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Photo')); ?></label>
					<div class="col-sm-10">
						<div class="input-group " data-toggle="aizuploader" data-type="image">
								<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
								</div>
								<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
								<input type="hidden" name="photo" value="<?php echo e($profession->photo); ?>" class="selected-files">
						</div>
						<div class="file-preview">
						</div>
					</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Add Content')); ?> <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<textarea
						class="aiz-text-editor form-control"
						placeholder="Content.."
						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
						data-min-height="300"
						name="description"
						required
					><?php echo $profession->description ?></textarea>
				</div>
			</div>
			<div class="text-right">
				<button type="submit" class="btn btn-primary"><?php echo e(translate('Update Page')); ?></button>
			</div>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/profession/edit.blade.php ENDPATH**/ ?>