<?php $__env->startSection('title','Add'); ?>
<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="row align-items-center">

		<div class="col">

			<h1 class="h3"><?php echo e(translate('Add New Home Slider')); ?></h1>

		</div>

	</div>

</div>

<div class="card">

	<form action="<?php echo e(route('custom-pages.homestoreslider')); ?>" method="POST" enctype="multipart/form-data">

		<?php echo csrf_field(); ?>

		<div class="card-header">

			<h6 class="fw-600 mb-0"><?php echo e(translate('Page Content')); ?></h6>

		</div>

		<div class="card-body">

			<div class="form-group row">

				<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Title')); ?> <span class="text-danger">*</span></label>

				<div class="col-sm-10">

					<input type="text" class="form-control" placeholder="Title" name="title" required>

				</div>

			</div>




			<div class="form-group row">

					<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Banner Image')); ?></label>

					<div class="col-sm-10">

						<div class="input-group " data-toggle="aizuploader" data-type="image">

								<div class="input-group-prepend">

										<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

								</div>

								<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

								<input type="hidden" name="banner_image" class="selected-files">

						</div>

						<div class="file-preview">

						</div>

					</div>

			</div>

			<div class="form-group row">

					<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Video Banner')); ?></label>

					<div class="col-sm-10">

						<div class="input-group " data-toggle="aizuploader" data-type="video">

								<div class="input-group-prepend">

										<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

								</div>

								<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

								<input type="hidden" name="banner_video" class="selected-files">

						</div>

						<div class="file-preview">

						</div>

					</div>

			</div>

			<div class="form-group row">

				<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Button Link')); ?></label>

				<div class="col-sm-10">

					<input type="text" class="form-control" placeholder="Button Link https://xyz.com/..." name="link">

				</div>

			</div>
			<div class="form-group row">

				<label class="col-sm-2 col-from-label" for="name"><?php echo e(translate('Add Content')); ?> <span class="text-danger">*</span></label>

				<div class="col-sm-10">

					<textarea

						class="aiz-text-editor form-control"

						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'

						placeholder="Content.."

						data-min-height="300"

						name="content"

						required

					></textarea>

				</div>

			</div>

		</div>




		<div class="card-body">





			<div class="text-right">

				<button type="submit" class="btn btn-primary"><?php echo e(translate('Save Page')); ?></button>

			</div>

		</div>

	</form>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/website_settings/pages/homecreateslider.blade.php ENDPATH**/ ?>