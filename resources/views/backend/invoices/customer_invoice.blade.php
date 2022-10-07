<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ get_setting('site_name') }}</title>

    <meta http-equiv="Content-Type" content="text/html;"/>

    <meta charset="UTF-8">

	<style media="all">

		@font-face {font-family: 'Roboto'; src: url("{{ static_asset('assets/fonts/Roboto-Regular.ttf') }}") format("truetype"); font-weight: normal; font-style: normal; } *{margin: 0; padding: 0; line-height: 1.3; font-family: 'Roboto'; color: #333542; } body{font-size: .875rem; } .gry-color *, .gry-color{color:#878f9c; } table{width: 100%; } table th{font-weight: normal; } table.padding th{padding: .5rem .7rem; } table.padding td{padding: .7rem; } table.sm-padding td{padding: .2rem .7rem; } .border-bottom td, .border-bottom th{border-bottom:1px solid #eceff4; } .text-left{text-align:left; } .text-right{text-align:right; } .small{font-size: .85rem; } .currency{}
	</style>

</head>

<body>

	<div>



		@php

			$logo = get_setting('header_logo');

		@endphp



		<div style="background: #eceff4;padding: 1.5rem;">

			<table>

				<tr>

					<td>

						@if($logo != null)

							<img loading="lazy"  src="{{ uploaded_asset($logo) }}" height="40" style="display:inline-block;">

						@else

							<img loading="lazy"  src="{{ static_asset('assets/img/logo.png') }}" height="40" style="display:inline-block;">

						@endif

					</td>

					<td style="font-size: 2.5rem;" class="text-right strong">{{  translate('INVOICE') }}</td>

				</tr>

			</table>

			<table>

				<tr>

					<td style="font-size: 1.2rem;" class="strong">{{ get_setting('site_name') }}</td>

					<td class="text-right"></td>

				</tr>

				<tr>

					<td class="gry-color small">{{ get_setting('contact_address') }}</td>

					<td class="text-right"></td>

				</tr>

				<tr>

					<td class="gry-color small">{{  translate('Email') }}: {{ get_setting('contact_email') }}</td>

					<td class="text-right small"><span class="gry-color small">{{  translate('Order ID') }}:</span> <span class="strong">{{ $order->code }}</span></td>

				</tr>

				<tr>

					<td class="gry-color small">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>

					<td class="text-right small"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>

				</tr>

			</table>



		</div>



		<div style="padding: 1.5rem;padding-bottom: 0">

            <table>

				@php

					$shipping_address = json_decode($order->shipping_address);

				@endphp

				<tr><td class="strong small gry-color">{{ translate('Bill to') }}:</td></tr>

				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>

				<tr><td class="gry-color small">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->country }}</td></tr>

				<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>

				<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>

			</table>

		</div>



	    <div style="padding: 1.5rem;">

			<table class="padding text-left small border-bottom">

				<thead>

	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">{{ translate('Product Name') }}</th>
	                    <th width="10%">{{ translate('Qty') }}</th>
	                    <th width="15%">{{ translate('Points') }}</th>
	                </tr>

				</thead>

				<tbody class="strong">

	                @foreach ($order->orderDetails as $key => $orderDetail)

		                @if ($orderDetail->ecom_product != null)

							<tr class="">

								<td>{{ $orderDetail->ecom_product->name }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</td>

								<td class="gry-color">{{ $orderDetail->quantity }}</td>

								<td class="gry-color currency">{{ $orderDetail->points }}</td>
							</tr>

		                @endif

					@endforeach

	            </tbody>

			</table>

		</div>



	    <div style="padding:0 1.5rem;">

	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">

		        <tbody>

			        <tr>

			            <th class="text-left strong">{{ translate('Grand Total') }}</th>

			            <td class="currency">{{ $order->grand_total }}</td>

			        </tr>

		        </tbody>

		    </table>

	    </div>



	</div>

</body>

</html>

