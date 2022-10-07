<?php $__env->startSection('header_style'); ?>
<style>
.mySlides {display: none; } .cursor {cursor: pointer; } .prev, .next {cursor: pointer; position: absolute; top: 40%; width: auto; padding: 16px; margin-top: -50px; color: white; font-weight: bold; font-size: 20px; border-radius: 0 3px 3px 0; user-select: none; -webkit-user-select: none; } .next {right: 0; border-radius: 3px 0 0 3px; } .prev:hover, .next:hover {background-color: rgba(0, 0, 0, 0.8); } .numbertext {color: #f2f2f2; font-size: 12px; padding: 8px 12px; position: absolute; top: 0; } .caption-container {text-align: center; background-color: #222; padding: 2px 16px; color: white; } .row:after {content: ""; display: table; clear: both; } .column {float: left; width: 18.66%; margin: 17px; } .demo {opacity: 0.6; } .active, .demo:hover {opacity: 1; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<section><br>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="container">
						<?php
                            $photos = explode(',',$detailedProduct->photos);
                        ?>
                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="mySlides">
							<img src="<?php echo e(uploaded_asset($photo)); ?>" style="width:100%">
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="row">
	                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="column">
								<img class="demo cursor" src="<?php echo e(uploaded_asset($photo)); ?>" style="width:100%" onclick="currentSlide(<?= $key+1 ?>)">
							</div>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
					</div>
				</div>
				<div class="col-sm">
					<h2><?php echo e($detailedProduct->name); ?></h2>
					<?php $detailedProduct->getTranslation('description'); ?>

					<h5 style="margin-top: 30px;"><b style="color: #F3735F;"> <i class="fa-solid fa-coins"></i><?php echo e($detailedProduct->unit_price); ?> Dwiggy coin</b>&nbsp;&nbsp;<s>  <?php echo e($detailedProduct->purchase_price); ?></s></h5>

					<h4 style="margin-top: 30px;">Quantity</h4>
					<button type="button" style="    border: 1px solid #bcb9b9;padding: 4px;width: 6%;" onclick="decre()" class="decrement-btn"><b>-</b></button>

					<input type="text" name="quantity" id="inc"  placeholder="1" value="<?php echo e($detailedProduct->min_qty); ?>" min="<?php echo e($detailedProduct->min_qty); ?>" max="10" style="border: none;width: 35px;padding: 10px;">

					<button style="    border: 1px solid #bcb9b9;padding: 4px;width: 6%;" type="button" onclick="incre()" class="increment-btn"><b>+</b></button>

					<div class="Dwiggy_bnr_btn mb-5">
						
						 <?php
                            $qty = 0;
                            if($detailedProduct->variant_product){
                                foreach ($detailedProduct->stocks as $key => $stock) {
                                    $qty += $stock->qty;
                                }
                            }
                            else{
                                $qty = $detailedProduct->current_stock;
                            }
                        ?>
                        <?php if($qty > 0): ?>

                            <button type="button" style="color: white;background: #F3735F;" class="dwiggy_btn bg-ff  bdr-none gothambold-f15" onclick="buyNow()">
                                <span> <?php echo e(translate('Buy Now')); ?></span>
                            </button>

                        <?php else: ?>

                            <span  style="color: white;background: #F3735F;" class="dwiggy_btn bg-ff  bdr-none gothambold-f15"><?php echo e(translate('Out of stock')); ?></span>

                        <?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
						
				<div class="col-md-12">
					<div class="bg-white mb-3 shadow-sm rounded">
                        <div class="nav border-bottom aiz-nav-tabs">
                            <a href="#tab_default_1" data-toggle="tab" style=" margin: 20px;   color: white;background: #F3735F;" class="dwiggy_btn bg-ff  bdr-none gothambold-f15"><?php echo e(translate('Description')); ?></a>
                            <?php if($detailedProduct->video_link != null): ?>
                                <a href="#tab_default_2" data-toggle="tab" style=" margin: 20px;   color: white;background: #F3735F;" class="dwiggy_btn bg-ff  bdr-none gothambold-f15"><?php echo e(translate('Video')); ?></a>
                            <?php endif; ?>
                                <a href="#tab_default_4" data-toggle="tab" style=" margin: 20px;   color: white;background: #F3735F;" class="dwiggy_btn bg-ff  bdr-none gothambold-f15"><?php echo e(translate('Reviews')); ?></a>
                        </div>

                        <div class="tab-content pt-0">
                            <div class="tab-pane fade active show" id="tab_default_1">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left">
                                        <?php echo $detailedProduct->getTranslation('description'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_default_2">
                                <div class="p-4">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php if($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1])): ?>
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e(explode('=', $detailedProduct->video_link)[1]); ?>"></iframe>
                                        <?php elseif($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1])): ?>
                                            <iframe class="embed-responsive-item" src="https://www.dailymotion.com/embed/video/<?php echo e(explode('video/', $detailedProduct->video_link)[1]); ?>"></iframe>
                                        <?php elseif($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1])): ?>
                                            <iframe src="https://player.vimeo.com/video/<?php echo e(explode('vimeo.com/', $detailedProduct->video_link)[1]); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_3">
                                <div class="p-4 text-center ">
                                    <a href="<?php echo e(uploaded_asset($detailedProduct->pdf)); ?>" class="btn btn-primary"><?php echo e(translate('Download')); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_4">
                                <div class="p-4">
                                    <div class="text-center fs-18 opacity-70">
                                        <?php echo e(translate('There have been no reviews for this product yet.')); ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<section style="margin-top: 30px; background-color: #EBEAE5;">
		<div class="container text-center">
			<h3 class="text-center" style="margin-top: 30px;">- BESTSELLING -</h3><br>
			<!-- <button style="border: 1px solid; padding: 5px; text-align: center;" class="">NEW</button> -->
		</div>
		<div class="row text-center" style="margin: 20px;">
			<?php $__currentLoopData = App\Models\EcomProduct::where('published', 1)->orderBy('num_of_sale', 'desc')->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-4">
					<a href="<?php echo e(route('products.details', $product->slug)); ?>">
						<img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>">
						<h4 style="margin-top: 10px;"><?php echo e($product->getTranslation('name')); ?></h4>
						<p><b><i class="fa-solid fa-coins"></i>
                        <?php echo e($product->unit_price); ?></span> Dwiggy coin&nbsp;&nbsp;<s>  <?php echo e($product->purchase_price); ?></s></b></p>
					</a>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</section>

	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>

<!-- Modal -->
<div class="modal fade" id="setAddress" tabindex="-1" role="dialog" aria-labelledby="addressModelsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModelsTitle">Shipping Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
            <form class="form-default" role="form" action="<?php echo e(route('products.order_shipping')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-3">
                    	<div class="row">
                         	<div class="col-md-12">
                         		<input type="hidden" name="product_id" value="<?php echo e($detailedProduct->id); ?>">
                         		<input type="hidden" name="quantity" id="quantity_val" value="<?php echo e($detailedProduct->min_qty); ?>">
                         		<input type="hidden" name="points" value="<?php echo e($detailedProduct->unit_price); ?>">
		                         <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					              <div class="contentforprof2" >
					                 <input type="radio" name="shipping_info" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?> checked <?php endif; ?> required>
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
					                </div><br>
					              </div><br>

					             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					         </div>
					     </div>
                        <div class="row">
                            <div class="col-md-6">
                            	<a href="<?php echo e(route('user.address')); ?>"><div style="background: green" class="btn btn-success"><?php echo e(translate('Add Address')); ?></div></a>
                            </div>
                            <div class="col-md-6">
                               <button type="submit" class="btn btn-success"><?php echo e(translate('Use Address')); ?></button>
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

	<script>
        function buyNow(){
        	$('#setAddress').modal('show');
        }




		var i = $('#inc').val();

		function incre() {
			i++;
			$('#quantity_val').val(i);
			document.getElementById('inc').value = i;
		}

		function decre() {
			if (i <= 1) {
				i = 1;
			} else {
				i--;
				$('#quantity_val').val(i);
				document.getElementById('inc').value = i;
			}
		}
	</script>
	<script>
		let slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			let dots = document.getElementsByClassName("demo");
			let captionText = document.getElementById("caption");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
			captionText.innerHTML = dots[slideIndex - 1].alt;
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/products-details.blade.php ENDPATH**/ ?>