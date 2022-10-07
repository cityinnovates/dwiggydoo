<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3"><?php echo e(translate('All Questions')); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6"><?php echo e(translate('Questions')); ?></h5>
				</div>
				<!-- <div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name & Enter')); ?>">
						</div>
					</form>
				</div> -->
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th><?php echo e(translate('Question & Answer')); ?></th>
		                    <th><?php echo e(translate('Type')); ?></th>
		                    <th><?php echo e(translate('Date')); ?></th>
		                    <th class="text-right"><?php echo e(translate('Options')); ?></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php $__currentLoopData = $rQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                	<?php $data_type_name = DB::table('reward_questions_type')->where('id', $Question->type)->first(); ?>
		                    <tr>
		                        <td><?php echo e(($key+1) + ($rQuestions->currentPage() - 1)*$rQuestions->perPage()); ?></td>
		                        <td><?php echo e($Question->question); ?><br>
	                        	<?php
	                        		foreach (json_decode($Question->option) as $key => $value) {
	                        			if($Question->answer == $key){
	                        				echo '<p class="text-success mb-0 font-weight-bold"><i class="las la-check"></i> '.$value."</p>";
	                        			}else{
	                        				echo '<p class="mb-0"><i class="las la-check"></i> '.$value."</p>";
	                        			}
	                        		}
	                        	?>
		                        </td>		
		                        <td><?php echo e($data_type_name->name); ?></td>		
		                        <td><?php echo e($Question->published_date); ?></td>		
		                        <td class="text-right">
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('reward_questions.edit', ['id'=>$Question->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('reward_questions.destroy', $Question->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
		                    </tr>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	<?php echo e($rQuestions->appends(request()->input())->links()); ?>

            	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6"><?php echo e(translate('Add New Question')); ?></h5>
			</div>
			<div class="card-body">
				<form action="<?php echo e(route('reward_questions.store')); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<div class="form-group mb-3">
						<label for="question"><?php echo e(translate('Question')); ?></label>
						<input type="text" placeholder="<?php echo e(translate('Question')); ?>" name="question" class="form-control" required>
					</div>

					<div class="form-group">
						<label><?php echo e(translate('Option')); ?></label>
						<div class="option-target">

							<div class="row gutters-5">
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Option" name="option[]" required>
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>

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
							<option disabled selected value="">Select Answer</option>
							<option value="0">1st</option>
							<option value="1">2nd</option>
							<option value="2">3rd</option>
							<option value="3">4th</option>
							<option value="4">5th</option>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="name"><?php echo e(translate('Publish Date')); ?></label>
						 <input type="date" class="form-control"  name="published_date" placeholder="<?php echo e(translate('Publish Date')); ?>" data-format="DD-MM-Y"data-advanced-range="false" autocomplete="off" onchange="date_change();" required>
					</div>
					<?php
						
					?>
					<div class="form-group mb-3">

						<label for="name"><?php echo e(translate('Type')); ?></label>
						<select name="type" class="form-control" required id="question_type_data">
							<option disabled selected value="">Select type</option>

							
						</select>
					</div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }
    function date_change(){
    	$('#question_type_data option:not(:first)').remove();
    	var  date = $('input[name="published_date"]').val();
    	
    	$.ajax({
    		url: "<?php echo e(route('reward_questions.type')); ?>",
    		type: 'Post',
    		data: { date: date, _token: "<?php echo e(csrf_token()); ?>"},
    		success: function(data){
    			var objkeys = $.parseJSON(data);  
    			$.each(objkeys, function (key, value) { 
					$('#question_type_data').append('<option value="'+ value.id +'">' + value.name + '</option>');
				})
    		}

    	})
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/reward/index.blade.php ENDPATH**/ ?>