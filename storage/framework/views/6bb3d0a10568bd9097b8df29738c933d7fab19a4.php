<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3"><?php echo e(translate('All Dog Listing')); ?></h1>
		</div>
        <?php if($type != 'Seller'): ?>

    		<!-- <div class="col-md-6 text-md-right">
    			<a href="<?php echo e(route('products.create')); ?>" class="btn btn-circle btn-info">
    				<span><?php echo e(translate('Add New Dog')); ?></span>
    			</a>
    		</div> -->
        <?php endif; ?>
	</div>
</div>
<br>

<div class="card">
	<form class="" id="sort_products" action="" method="GET">
		<div class="card-header row gutters-5">
			<div class="col text-center text-md-left">
				<h5 class="mb-md-0 h6"><?php echo e(translate('All Product')); ?></h5>
			</div>
			<?php if($type == 'Seller'): ?>
			<div class="col-md-2 ml-auto" style="display: none;">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
     			<option value=""><?php echo e(translate('All Sellers')); ?></option>
		            <?php $__currentLoopData = App\Seller::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <?php if($seller->user != null && $seller->user->shop != null): ?>
		                    <option value="<?php echo e($seller->user->id); ?>" <?php if($seller->user->id == $seller_id): ?> selected <?php endif; ?>><?php echo e($seller->user->shop->name); ?> (<?php echo e($seller->user->name); ?>)</option>
		                <?php endif; ?>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<?php endif; ?>
			<?php if($type == 'All'): ?>
			<div class="col-md-2 ml-auto" style="display: none;">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
					<option value=""><?php echo e(translate('All Sellers')); ?></option>
		            <?php $__currentLoopData = App\User::where('user_type', '=', 'admin')->orWhere('user_type', '=', 'seller')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<option value="<?php echo e($seller->id); ?>" <?php if($seller->id == $seller_id): ?> selected <?php endif; ?>><?php echo e($seller->name); ?></option>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<?php endif; ?>

			<div class="col-md-2 ml-auto" style="display: none;">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
					<option value=""><?php echo e(translate('Sort By')); ?></option>
			        <option value="rating,desc" <?php if(isset($col_name , $query)): ?> <?php if($col_name == 'rating' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Rating (High > Low)')); ?></option>
			        <option value="rating,asc" <?php if(isset($col_name , $query)): ?> <?php if($col_name == 'rating' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Rating (Low > High)')); ?></option>
			        <option value="num_of_sale,desc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'num_of_sale' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Num of Sale (High > Low)')); ?></option>
			        <option value="num_of_sale,asc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'num_of_sale' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Num of Sale (Low > High)')); ?></option>
			        <option value="unit_price,desc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'unit_price' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Base Price (High > Low)')); ?></option>
			        <option value="unit_price,asc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'unit_price' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Base Price (Low > High)')); ?></option>
				</select>
			</div>
              <div class="col-md-2">
             
                <div class="form-group mb-0">
                       <a class="btn btn-primary" style="color: white;" data-toggle="modal" data-target="#myModaluser" >Import User</a>
                   
                </div>
            </div>
            <div class="col-md-2">
             
                <div class="form-group mb-0">
                       <a class="btn btn-primary" style="color: white;" data-toggle="modal" data-target="#myModal" >Import Dog</a>
                   
                </div>
            </div>

			<div class="col-md-2">
             
				<div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type & Enter')); ?>">
				</div>
			</div>
		</div>
	</form>

     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
         <center> <h4 class="modal-title">Import Dog Profile</h4> </center>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="https://cilearningschool.com/dwiggydoo/import.php" enctype='multipart/form-data'>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Import Csv</label>
              <input type="file" class="form-control" name="file" id="usrname">
            </div>     
           
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


      <!-- Modal -->
  <div class="modal fade" id="myModaluser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <center>  <h4 class="modal-title">Import User Profile</h4> </center>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="https://cilearningschool.com/dwiggydoo/importuser.php" enctype='multipart/form-data'>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Import Csv</label>
              <input type="file" class="form-control" name="file" id="usrname">
            </div>     
           
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


    <div class="card-body">

        <table class="table aiz-table mb-0">

            <thead>

                <tr>

                    <th>#</th>

                    <th width="20%"><?php echo e(translate('Name')); ?></th>

                    <?php if($type == 'Seller' || $type == 'All'): ?>

                        <th><?php echo e(translate('Added By')); ?></th>

                    <?php endif; ?>


                    <th><?php echo e(translate('Published')); ?></th>

                    <th><?php echo e(translate('Featured')); ?></th>

                    <th class="text-right"><?php echo e(translate('Options')); ?></th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?Php  //print_r($product);  ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($products->currentPage() - 1)*$products->perPage()); ?></td>
                        <td>
                          
								<div class="form-group row">
									<div class="col-md-4">

    <?php   if($product->file_path!=''){ 
                            $fgf=explode('.',$product->file_path); 
                          if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
                        <img src="<?php echo e($product->file_path); ?>"   alt="Image" class="w-50px" width="100"  height="100">
                                                <?php  } else {   ?>
                           <video controls width="100"  height="100">
                           <source src="<?php echo e($product->file_path); ?>" type="video/mp4"  alt="Image" class="w-50px" width="100"  height="100">
                           Your browser does not support the video tag.
                          </video>              
                                            <?php }  




                                    ?>

                                <!-- <img src="<?php echo e($product->file_path); ?>"> -->


                                <?php  }   else {   ?>
                                <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"  alt="Image" class="w-50px">
                                <?php  }   ?>


									</div>
									<div class="col-md-8">
										<span class="text-muted"><?php echo e($product->getTranslation('name')); ?></span>
									</div>
								</div>
						
                        </td>
                        <?php if($type == 'Seller' || $type == 'All'): ?>
                            <td><?php echo e($product->user->name); ?></td>

                        <?php endif; ?>

                                          <td>

							<label class="aiz-switch aiz-switch-success mb-0">

                              <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >

                              <span class="slider round"></span>

							</label>

						</td>

                      	<td>

							<label class="aiz-switch aiz-switch-success mb-0">

	                            <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >

	                            <span class="slider round"></span>

							</label>

						</td>

						<td class="text-right">

							<?php if($type == 'Seller'): ?>

		                      <!-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('products.seller.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>"> -->

		                          <!-- <i class="las la-edit"></i> -->

		                      <!-- </a> -->

							<?php else: ?>

								<!-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('products.admin.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>"> -->

								   <!-- <i class="las la-edit"></i> -->

							   <!-- </a> -->

							<?php endif; ?>

							<!-- <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="<?php echo e(route('products.duplicate', ['id'=>$product->id, 'type'=>$type]  )); ?>" title="<?php echo e(translate('Duplicate')); ?>"> -->

							   <!-- <i class="las la-copy"></i> -->

						   <!-- </a> -->

                           <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('products.destroy', $product->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                              <i class="las la-trash"></i>
                           </a>
                      </td>
                  	</tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

        <div class="aiz-pagination">

            <?php echo e($products->appends(request()->input())->links()); ?>


        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('modal'); ?>

    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('script'); ?>

    <script type="text/javascript">



        $(document).ready(function(){

            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');

        });



        function update_todays_deal(el){

            if(el.checked){

                var status = 1;

            }

            else{

                var status = 0;

            }

            $.post('<?php echo e(route('products.todays_deal')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){

                if(data == 1){

                    AIZ.plugins.notify('success', '<?php echo e(translate('Todays Deal updated successfully')); ?>');

                }

                else{

                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');

                }

            });

        }



        function update_published(el){

            if(el.checked){

                var status = 1;

            }

            else{

                var status = 0;

            }

            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){

                if(data == 1){

                    AIZ.plugins.notify('success', '<?php echo e(translate('Published products updated successfully')); ?>');

                }

                else{

                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');

                }

            });

        }



        function update_featured(el){

            if(el.checked){

                var status = 1;

            }

            else{

                var status = 0;

            }

            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){

                if(data == 1){

                    AIZ.plugins.notify('success', '<?php echo e(translate('Featured products updated successfully')); ?>');

                }

                else{

                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');

                }

            });

        }



        function sort_products(el){

            $('#sort_products').submit();

        }



    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/product/products/index.blade.php ENDPATH**/ ?>