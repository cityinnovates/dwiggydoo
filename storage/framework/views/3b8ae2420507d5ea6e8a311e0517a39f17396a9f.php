<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(get_setting('site_name')); ?></title>

    <meta http-equiv="Content-Type" content="text/html;"/>

    <meta charset="UTF-8">

	<style media="all">

		@font-face {font-family: 'Roboto'; src: url("<?php echo e(static_asset('assets/fonts/Roboto-Regular.ttf')); ?>") format("truetype"); font-weight: normal; font-style: normal; } *{margin: 0; padding: 0; line-height: 1.3; font-family: 'Roboto'; color: #333542; } body{font-size: .875rem; } .gry-color *, .gry-color{color:#878f9c; } table{width: 100%; } table th{font-weight: normal; } table.padding th{padding: .5rem .7rem; } table.padding td{padding: .7rem; } table.sm-padding td{padding: .2rem .7rem; } .border-bottom td, .border-bottom th{border-bottom:1px solid #eceff4; } .text-left{text-align:left; } .text-right{text-align:right; } .small{font-size: .85rem; } .currency{}
	</style>

</head>

<body>

	<div>



		<?php

			$logo = get_setting('header_logo');

		?>



		<div style="background: #eceff4;padding: 1.5rem;">

			<table>

				<tr>

					<td>

						<?php if($logo != null): ?>

							<img loading="lazy"  src="<?php echo e(uploaded_asset($logo)); ?>" height="40" style="display:inline-block;">

						<?php else: ?>

							<img loading="lazy"  src="<?php echo e(static_asset('assets/img/logo.png')); ?>" height="40" style="display:inline-block;">

						<?php endif; ?>

					</td>

					<td style="font-size: 2.5rem;" class="text-right strong"><?php echo e(translate('INVOICE')); ?></td>

				</tr>

			</table>

			<table>

				<tr>

					<td style="font-size: 1.2rem;" class="strong"><?php echo e(get_setting('site_name')); ?></td>

					<td class="text-right"></td>

				</tr>

				<tr>

					<td class="gry-color small"><?php echo e(get_setting('contact_address')); ?></td>

					<td class="text-right"></td>

				</tr>

				<tr>

					<td class="gry-color small"><?php echo e(translate('Email')); ?>: <?php echo e(get_setting('contact_email')); ?></td>

					<td class="text-right small"><span class="gry-color small"><?php echo e(translate('Order ID')); ?>:</span> <span class="strong"><?php echo e($order->code); ?></span></td>

				</tr>

				<tr>

					<td class="gry-color small"><?php echo e(translate('Phone')); ?>: <?php echo e(get_setting('contact_phone')); ?></td>

					<td class="text-right small"><span class="gry-color small"><?php echo e(translate('Order Date')); ?>:</span> <span class=" strong"><?php echo e(date('d-m-Y', $order->date)); ?></span></td>

				</tr>

			</table>



		</div>



		<div style="padding: 1.5rem;padding-bottom: 0">

            <table>

				<?php

					$shipping_address = json_decode($order->shipping_address);

				?>

				<tr><td class="strong small gry-color"><?php echo e(translate('Bill to')); ?>:</td></tr>

				<tr><td class="strong"><?php echo e($shipping_address->name); ?></td></tr>

				<tr><td class="gry-color small"><?php echo e($shipping_address->address); ?>, <?php echo e($shipping_address->city); ?>, <?php echo e($shipping_address->country); ?></td></tr>

				<tr><td class="gry-color small"><?php echo e(translate('Email')); ?>: <?php echo e($shipping_address->email); ?></td></tr>

				<tr><td class="gry-color small"><?php echo e(translate('Phone')); ?>: <?php echo e(@$shipping_address->phone); ?></td></tr>

			</table>

		</div>



	    <div style="padding: 1.5rem;">

			<table class="padding text-left small border-bottom">

				<thead>

	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%"><?php echo e(translate('Product Name')); ?></th>
	                    <th width="10%"><?php echo e(translate('Qty')); ?></th>
	                    <th width="15%"><?php echo e(translate('Points')); ?></th>
	                </tr>

				</thead>

				<tbody class="strong">

	                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		                <?php if($orderDetail->ecom_product != null): ?>

							<tr class="">

								<td><?php echo e($orderDetail->ecom_product->name); ?> <?php if($orderDetail->variation != null): ?> (<?php echo e($orderDetail->variation); ?>) <?php endif; ?></td>

								<td class="gry-color"><?php echo e($orderDetail->quantity); ?></td>

								<td class="gry-color currency"><?php echo e($orderDetail->points); ?></td>
							</tr>

		                <?php endif; ?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	            </tbody>

			</table>

		</div>



	    <div style="padding:0 1.5rem;">

	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">

		        <tbody>

			        <tr>

			            <th class="text-left strong"><?php echo e(translate('Grand Total')); ?></th>

			            <td class="currency"><?php echo e($order->grand_total); ?></td>

			        </tr>

		        </tbody>

		    </table>

	    </div>



	</div>

</body>

</html>

<?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/invoices/user_invoice.blade.php ENDPATH**/ ?>