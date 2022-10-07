<?php $__env->startSection('title','Home Page Settings'); ?>
<?php $__env->startSection('content'); ?>





<div class="card">

	<div class="card-header">

		<h6 class="fw-600 mb-0"><?php echo e(translate('Home Page Settings')); ?></h6>

	</div>

	<div class="card-body">

		<div class="row gutters-10">

			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Home Slider')); ?></h6>

					</div>

					<div class="card-body">

						<div class="alert alert-info">

							<?php echo e(translate('We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.')); ?>


						</div>

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<label><?php echo e(translate('Photos & Links')); ?></label>

								<div class="home-slider-target">

									<input type="hidden" name="types[]" value="home_slider_images">

									<input type="hidden" name="types[]" value="home_slider_links">
									<input type="hidden" name="types[]" value="home_slider_text">
									<input type="hidden" name="types[]" value="home_slider_text2">

									<?php if(get_setting('home_slider_images') != null): ?>

										<?php $__currentLoopData = json_decode(get_setting('home_slider_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<div class="row gutters-5">

												<div class="col-5">

													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_slider_images">

						                                <input type="hidden" name="home_slider_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_slider_images'), true)[$key]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>

												</div>

												<div class="col">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_slider_links">

														<input type="text" class="form-control" placeholder="banner text h1" name="home_slider_links[]" value="<?php echo e(json_decode(get_setting('home_slider_links'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_slider_text">
														<input type="text" class="form-control" placeholder="banner text h3" name="home_slider_text[]" value="<?php echo e(json_decode(get_setting('home_slider_text'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_slider_text2">
													

															<textarea

						class="aiz-text-editor form-control"

						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'

						placeholder="Content.."

						data-min-height="300"

						

						name="home_slider_text2[]"

						required

					><?php echo e(json_decode(get_setting('home_slider_text2'), true)[$key]); ?></textarea>

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

										<div class="col-5">

											<div class="input-group" data-toggle="aizuploader" data-type="image">

												<div class="input-group-prepend">

													<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

												</div>

												<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

												<input type="hidden" name="types[]" value="home_slider_images">

												<input type="hidden" name="home_slider_images[]" class="selected-files">

											</div>

											<div class="file-preview box sm">

											</div>

										</div>

										<div class="col">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_slider_links">

												<input type="text" class="form-control" placeholder="http://" name="home_slider_links[]">

											</div>

										</div>
												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_slider_text">
														<input type="text" class="form-control" placeholder="banner text h3" name="home_slider_text[]" value="<?php echo e(json_decode(get_setting('home_slider_text'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_slider_text2">
														<input type="text" class="form-control" placeholder="http://" name="home_slider_text2[]" value="<?php echo e(json_decode(get_setting('home_slider_text2'), true)[$key]); ?>">

													</div>

												</div>
										<div class="col-auto">

											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

												<i class="las la-times"></i>

											</button>

										</div>

									</div>'

									data-target=".home-slider-target">

									<?php echo e(translate('Add New')); ?>


								</button>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>



			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Home Categories')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<label><?php echo e(translate('Categories')); ?></label>

								<div class="home-categories-target">

									<input type="hidden" name="types[]" value="home_categories">

									<?php if(get_setting('home_categories') != null): ?>

										<?php $__currentLoopData = json_decode(get_setting('home_categories'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<div class="row gutters-5">

												<div class="col">

													<div class="form-group">

														<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" required>

							                                <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							                                    <option value="<?php echo e($category->id); ?>" <?php if( $value == $category->id): ?> selected <?php endif; ?>><?php echo e($category->getTranslation('name')); ?></option>

							                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							                            </select>

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

									data-content='<div class="row gutters-5">

										<div class="col">

											<div class="form-group">

												<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" required>

													<?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

														<option value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>

													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</select>

											</div>

										</div>

										<div class="col-auto">

											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

												<i class="las la-times"></i>

											</button>

										</div>

									</div>'

									data-target=".home-categories-target">

									<?php echo e(translate('Add New')); ?>


								</button>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>



			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Home Register now (Max 3)')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<label><?php echo e(translate('Banner & Links')); ?></label>

								<div class="home-banner1-target">

									<input type="hidden" name="types[]" value="home_banner1_images">

									<input type="hidden" name="types[]" value="home_banner1_links">
									<input type="hidden" name="types[]" value="home_banner1_text1">

									<input type="hidden" name="types[]" value="home_banner1_text2">

									<?php if(get_setting('home_banner1_images') != null): ?>

										<?php $__currentLoopData = json_decode(get_setting('home_banner1_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<div class="row gutters-5">

												<div class="col-5">

													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_banner1_images">

						                                <input type="hidden" name="home_banner1_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_banner1_images'), true)[$key]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>

												</div>

												<div class="col">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_banner1_links">

														<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]" value="<?php echo e(json_decode(get_setting('home_banner1_links'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_banner1_text1">

														<input type="text" class="form-control" placeholder="h2 heading" name="home_banner1_text1[]" value="<?php echo e(json_decode(get_setting('home_banner1_text1'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_banner1_text2">

													


															<textarea

						class="aiz-text-editor form-control"

						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'

						placeholder="Content.."

						data-min-height="300"

						

						name="home_banner1_text2[]"

						required

					><?php echo e(json_decode(get_setting('home_banner1_text2'), true)[$key]); ?></textarea>

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

										<div class="col-5">

											<div class="input-group" data-toggle="aizuploader" data-type="image">

												<div class="input-group-prepend">

													<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

												</div>

												<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

												<input type="hidden" name="types[]" value="home_banner1_images">

												<input type="hidden" name="home_banner1_images[]" class="selected-files">

											</div>

											<div class="file-preview box sm">

											</div>

										</div>

										<div class="col">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_banner1_links">

												<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]">

											</div>

										</div>

										<div class="col-12">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_banner1_text1">

												<input type="text" class="form-control" placeholder="h2 heading" name="home_banner1_text1[]">

											</div>

										</div>

										<div class="col-12">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_banner1_text2">

												<input type="text" class="form-control" placeholder="h4 heading" name="home_banner1_text2[]">

											</div>

										</div>

										<div class="col-auto">

											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

												<i class="las la-times"></i>

											</button>

										</div>

									</div>'

									data-target=".home-banner1-target">

									<?php echo e(translate('Add New')); ?>


								</button>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>



			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Home Memes  (Max 3)')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<label><?php echo e(translate('Banner & Links')); ?></label>

								<div class="home-banner2-target">

									<input type="hidden" name="types[]" value="home_banner2_images">

									<input type="hidden" name="types[]" value="home_banner2_links">
									<input type="hidden" name="types[]" value="home_banner2_text1">

									<?php if(get_setting('home_banner2_images') != null): ?>

										<?php $__currentLoopData = json_decode(get_setting('home_banner2_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<div class="row gutters-5">

												<div class="col-5">

													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_banner2_images">

						                                <input type="hidden" name="home_banner2_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_banner2_images'), true)[$key]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>

												</div>

												<div class="col">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_banner2_links">

														<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]" value="<?php echo e(json_decode(get_setting('home_banner2_links'), true)[$key]); ?>">

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_banner2_text1">

														<input type="text" class="form-control" placeholder="Name" name="home_banner2_text1[]" value="<?php echo e(json_decode(get_setting('home_banner2_text1'), true)[$key]); ?>">

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

										<div class="col-5">

											<div class="input-group" data-toggle="aizuploader" data-type="image">

												<div class="input-group-prepend">

													<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

												</div>

												<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

												<input type="hidden" name="types[]" value="home_banner2_images">

												<input type="hidden" name="home_banner2_images[]" class="selected-files">

											</div>

											<div class="file-preview box sm">

											</div>

										</div>

										<div class="col">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_banner2_links">

												<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]">

											</div>

										</div>

										<div class="col-12">

											<div class="form-group">

												<input type="hidden" name="types[]" value="home_banner2_text1">

												<input type="text" class="form-control" placeholder="Name" name="home_banner2_text1[]">

											</div>

										</div>

										<div class="col-auto">

											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

												<i class="las la-times"></i>

											</button>

										</div>

									</div>'

									data-target=".home-banner2-target">

									<?php echo e(translate('Add New')); ?>


								</button>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>



			

			<!-- <div class="col-lg-12">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Top 10')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group row">

								<label class="col-md-2 col-from-label"><?php echo e(translate('Top Categories (Max 10)')); ?></label>

								<div class="col-md-10">

									<input type="hidden" name="types[]" value="top10_categories">

									<select name="top10_categories[]" class="form-control aiz-selectpicker" multiple data-max-options="10" data-live-search="true" required>

										<?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<option value="<?php echo e($category->id); ?>" <?php if(in_array($category->id, json_decode(get_setting('top10_categories')))): ?> selected <?php endif; ?>><?php echo e($category->getTranslation('name')); ?></option>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</select>

								</div>

							</div>

							<div class="form-group row">

								<label class="col-md-2 col-from-label"><?php echo e(translate('Top Brands (Max 10)')); ?></label>

								<div class="col-md-10">

									<input type="hidden" name="types[]" value="top10_brands">

									<select name="top10_brands[]" class="form-control aiz-selectpicker" multiple data-max-options="10" data-live-search="true" required>

										<?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<option value="<?php echo e($brand->id); ?>" <?php if(in_array($brand->id, json_decode(get_setting('top10_brands')))): ?> selected <?php endif; ?>><?php echo e($brand->getTranslation('name')); ?></option>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</select>

								</div>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div> -->

			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('Home Testimonial')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<label><?php echo e(translate('Heading, Star, Description, Name & Location')); ?></label>

								<div class="home-slider-target">

									<input type="hidden" name="types[]" value="home_testimonial_heading">

									<input type="hidden" name="types[]" value="home_testimonial_star">
									<input type="hidden" name="types[]" value="home_testimonial_description">
									<input type="hidden" name="types[]" value="home_testimonial_name">
									<input type="hidden" name="types[]" value="home_testimonial_location">

									<?php if(get_setting('home_testimonial_heading') != null): ?>

										<?php $__currentLoopData = json_decode(get_setting('home_testimonial_heading'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<div class="row gutters-5">

												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_heading">
														<input type="text" class="form-control" placeholder="Heading" name="home_testimonial_heading[]" value="<?php echo e(json_decode(get_setting('home_testimonial_heading'), true)[$key]); ?>">

													</div>

												</div>
												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_star">
														<select class="form-control" name="home_testimonial_star[]">
															<option value="0">Select Star Mark</option>
															<option <?php if( json_decode(get_setting('home_testimonial_star'), true)[$key] == 1){ echo 'selected'; } ?> value="1">1</option>
															<option <?php if( json_decode(get_setting('home_testimonial_star'), true)[$key] == 2){ echo 'selected'; } ?>  value="2">2</option>
															<option <?php if( json_decode(get_setting('home_testimonial_star'), true)[$key] == 3){ echo 'selected'; } ?>  value="3">3</option>
															<option <?php if( json_decode(get_setting('home_testimonial_star'), true)[$key] == 4){ echo 'selected'; } ?>  value="4">4</option>
															<option <?php if( json_decode(get_setting('home_testimonial_star'), true)[$key] == 5){ echo 'selected'; } ?>  value="5">5</option>
														</select><!-- 
														<input type="text" class="form-control" placeholder="Star" name="home_testimonial_star[]" value="<?php echo e(json_decode(get_setting('home_testimonial_star'), true)[$key]); ?>"> -->

													</div>

												</div>
												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_description">
														<input type="text" class="form-control" placeholder="Description" name="home_testimonial_description[]" value="<?php echo e(json_decode(get_setting('home_testimonial_description'), true)[$key]); ?>">

													</div>

												</div>
												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_name">
														<input type="text" class="form-control" placeholder="Name" name="home_testimonial_name[]" value="<?php echo e(json_decode(get_setting('home_testimonial_name'), true)[$key]); ?>">

													</div>

												</div>
												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_location">
														<input type="text" class="form-control" placeholder="Location" name="home_testimonial_location[]" value="<?php echo e(json_decode(get_setting('home_testimonial_location'), true)[$key]); ?>">

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

												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_heading">
														<input type="text" class="form-control" placeholder="Heading" name="home_testimonial_heading[]">

													</div>

												</div>

												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_star">
														<select class="form-control" name="home_testimonial_star[]">
															<option value="0">Select Star Mark</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>

													</div>

												</div>

												<div class="col-12">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_description">
														<input type="text" class="form-control" placeholder="Description" name="home_testimonial_description[]">

													</div>

												</div>

												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_name">
														<input type="text" class="form-control" placeholder="Name" name="home_testimonial_name[]">

													</div>

												</div>

												<div class="col-6">

													<div class="form-group">

														<input type="hidden" name="types[]" value="home_testimonial_location">
														<input type="text" class="form-control" placeholder="Location" name="home_testimonial_location[]">

													</div>

												</div>
										<div class="col-auto">

											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

												<i class="las la-times"></i>

											</button>

										</div>

									</div>'

									data-target=".home-slider-target">

									<?php echo e(translate('Add New')); ?>


								</button>

							</div>

							<div class="text-right">

								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>

			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('World Banner')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<div class="home-slider-target">

									<?php if(get_setting('home_world_section_heading') != null): ?>

											<div class="row gutters-5">
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_world_section_heading">
														<input type="text" class="form-control" name="home_world_section_heading" value="<?php echo e(get_setting('home_world_section_heading')); ?>" placeholder="Heading">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_world_section_button_link">
														<input type="text"  class="form-control" name="home_world_section_button_link" value="<?php echo e(get_setting('home_world_section_button_link')); ?>" placeholder="Link">
													</div>
												</div>
												<div class="col-12">
													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_world_section_background">

						                                <input type="hidden" name="home_world_section_background[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_world_section_background'), true)[0]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>
												</div>
												<div class="col-12">
													<input type="hidden" name="types[]" value="home_world_section_content">

													<textarea class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]' placeholder="Content.." data-min-height="300" name="home_world_section_content[]"><?php echo e(json_decode(get_setting('home_world_section_content'), true)[0]); ?></textarea>
												</div>
											</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>

			

			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('About Section What')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<div class="home-slider-target">

									<?php if(get_setting('home_about_section_heading') != null): ?>

											<div class="row gutters-5">
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_heading">
														<input type="text" class="form-control" name="home_about_section_heading" value="<?php echo e(get_setting('home_about_section_heading')); ?>" placeholder="Heading">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_button_link">
														<input type="text"  class="form-control" name="home_about_section_button_link" value="<?php echo e(get_setting('home_about_section_button_link')); ?>" placeholder="Link">
													</div>
												</div>
												<div class="col-12">
													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_about_section_image">

						                                <input type="hidden" name="home_about_section_image[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_about_section_image'), true)[0]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>
												</div>
												<div class="col-12">
													<input type="hidden" name="types[]" value="home_about_section_content">

													<textarea class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]' placeholder="Content.." data-min-height="300" name="home_about_section_content[]"><?php echo e(json_decode(get_setting('home_about_section_content'), true)[0]); ?></textarea>
												</div>
											</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('About Section Why')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<div class="home-slider-target">

									<?php if(get_setting('home_about_section_heading_why') != null): ?>

											<div class="row gutters-5">
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_heading_why">
														<input type="text" class="form-control" name="home_about_section_heading_why" value="<?php echo e(get_setting('home_about_section_heading_why')); ?>" placeholder="Heading">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_button_link_why">
														<input type="text"  class="form-control" name="home_about_section_button_link_why" value="<?php echo e(get_setting('home_about_section_button_link_why')); ?>" placeholder="Link">
													</div>
												</div>
												<div class="col-12">
													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_about_section_image_why">

						                                <input type="hidden" name="home_about_section_image_why[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_about_section_image_why'), true)[0]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>
												</div>
												<div class="col-12">
													<input type="hidden" name="types[]" value="home_about_section_content_why">

													<textarea class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]' placeholder="Content.." data-min-height="300" name="home_about_section_content_why[]"><?php echo e(json_decode(get_setting('home_about_section_content_why'), true)[0]); ?></textarea>
												</div>
											</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<div class="col-lg-6">

				<div class="card shadow-none bg-light">

					<div class="card-header">

						<h6 class="mb-0"><?php echo e(translate('About Section Rewards')); ?></h6>

					</div>

					<div class="card-body">

						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

							<?php echo csrf_field(); ?>

							<div class="form-group">

								<div class="home-slider-target">

									<?php if(get_setting('home_about_section_heading_rewards') != null): ?>

											<div class="row gutters-5">
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_heading_rewards">
														<input type="text" class="form-control" name="home_about_section_heading_rewards" value="<?php echo e(get_setting('home_about_section_heading_rewards')); ?>" placeholder="Heading">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="hidden" name="types[]" value="home_about_section_button_link_rewards">
														<input type="text"  class="form-control" name="home_about_section_button_link_rewards" value="<?php echo e(get_setting('home_about_section_button_link_rewards')); ?>" placeholder="Link">
													</div>
												</div>
												<div class="col-12">
													<div class="input-group" data-toggle="aizuploader" data-type="image">

						                                <div class="input-group-prepend">

						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>

						                                </div>

						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>

														<input type="hidden" name="types[]" value="home_about_section_image_rewards">

						                                <input type="hidden" name="home_about_section_image_rewards[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_about_section_image_rewards'), true)[0]); ?>">

						                            </div>

						                            <div class="file-preview box sm">

						                            </div>
												</div>
												<div class="col-12">
													<input type="hidden" name="types[]" value="home_about_section_content_rewards">

													<textarea class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]' placeholder="Content.." data-min-height="300" name="home_about_section_content_rewards[]"><?php echo e(json_decode(get_setting('home_about_section_content_rewards'), true)[0]); ?></textarea>
												</div>
											</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>


			

			<div class="col-lg-6">
				<div class="card shadow-none bg-light">
					<div class="card-header">
						<h6 class="mb-0"><?php echo e(translate('Footer Images')); ?></h6>
					</div>
					<div class="card-body">
						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="form-group">
								<label><?php echo e(translate('Photos')); ?></label>
								<div class="home-footer-target">
									<?php if(get_setting('home_footer_images') != null): ?>
										<?php $__currentLoopData = json_decode(get_setting('home_footer_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="row gutters-5">
												<div class="col-10">
													<div class="input-group" data-toggle="aizuploader" data-type="image">
						                                <div class="input-group-prepend">
						                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
						                                </div>
						                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
														<input type="hidden" name="types[]" value="home_footer_images">
						                                <input type="hidden" name="home_footer_images" class="selected-files" value="<?php echo e(json_decode(get_setting('home_footer_images'), true)[$key]); ?>">
						                            </div>
						                            <div class="file-preview box sm">
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
										<div class="col-10">
											<div class="input-group" data-toggle="aizuploader" data-type="image">
												<div class="input-group-prepend">
													<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
												</div>
												<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
												<input type="hidden" name="types[]" value="home_slider_images">
												<input type="hidden" name="home_footer_images" class="selected-files">
											</div>
											<div class="file-preview box sm">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>'
									data-target=".home-footer-target">
									<?php echo e(translate('Add New')); ?>

								</button>

							</div>

							<div class="text-right">
								<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

    <script type="text/javascript">

		$(document).ready(function(){

		    AIZ.plugins.bootstrapSelect('refresh');

		});

    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/website_settings/pages/home_page_edit.blade.php ENDPATH**/ ?>