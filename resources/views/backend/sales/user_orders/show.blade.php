@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
          <h1 class="h2">{{ translate('Order Details') }}</h1>
        </div>
        <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              @php
                  $delivery_status = $order->orderDetails->first()->delivery_status;
                  $payment_status = $order->orderDetails->first()->payment_status;
              @endphp
  			         <div class="col-md-3 ml-auto">
                  <label for=update_delivery_status"">{{translate('Delivery Status')}}</label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                      <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                      <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                      <option value="on_delivery" @if ($delivery_status == 'on_delivery') selected @endif>{{translate('On delivery')}}</option>
                      <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                  </select>
  			</div>
  		</div>
    	<div class="card-body">
        <div class="card-header row gutters-6">
  			<div class="col text-center text-md-left">
            <address>
                <strong class="text-main">{{ json_decode($order->shipping_address)->name }}</strong><br>
                {{ json_decode($order->shipping_address)->email }}<br>
                {{ optional(json_decode($order->shipping_address))->phone }}<br>
                {{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->postal_code }}<br>
                {{ json_decode($order->shipping_address)->country }}
            </address>
  				</div>
  				<div class="col-md-4 ml-auto">
            <table>
        				<tbody>
            				<tr>
            					<td class="text-main text-bold">{{translate('Order #')}}</td>
            					<td class="text-right text-info text-bold">	{{ $order->code }}</td>
            				</tr>
            				<tr>
                      <td class="text-main text-bold">{{translate('Order Status')}}</td>
                          @php
                            $status = $order->orderDetails->first()->delivery_status;
                          @endphp
            					 <td class="text-right">
                            @if($status == 'delivered')
                                <span class="badge badge-inline badge-success">{{ translate(ucfirst(str_replace('_', ' ', $status))) }}</span>
                            @else
                                <span class="badge badge-inline badge-info">{{ translate(ucfirst(str_replace('_', ' ', $status))) }}</span>
                            @endif
      					        </td>
            				</tr>
            				<tr>
            					<td class="text-main text-bold">{{translate('Order Date')}}	</td>
            					<td class="text-right">{{ date('d-m-Y h:i A', $order->date) }}</td>
            				</tr>
                    <tr>
            					<td class="text-main text-bold">{{translate('Total points')}}	</td>
            					<td class="text-right">
            						{{ $order->grand_total }}
            					</td>
            				</tr>
        				</tbody>
    				</table>
  				</div>
  			</div>
    		<hr class="new-section-sm bord-no">
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                        <th class="min-col">#</th>
                        <th width="10%">{{translate('Photo')}}</th>
              					<th class="min-col text-center text-uppercase">{{translate('Name')}}</th>
                        <th class="min-col text-center text-uppercase">{{translate('Qty')}}</th>
              					<th class="min-col text-center text-uppercase">{{translate('Points')}}</th>
            				</tr>
        				</thead>
        				<tbody>
                    @foreach ($order->orderDetails as $key => $orderDetail)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                          @if ($orderDetail->ecom_product != null)
                            <a href="{{ route('product', $orderDetail->ecom_product->slug) }}" target="_blank"><img height="50" src="{{ uploaded_asset($orderDetail->ecom_product->thumbnail_img) }}"></a>
                          @else
                            <strong>{{ translate('N/A') }}</strong>
                          @endif
                          </td>
                        <td>
                          @if ($orderDetail->ecom_product != null)
                            <strong><a href="{{ route('products.details', $orderDetail->ecom_product->slug) }}" target="_blank" class="text-muted">{{ $orderDetail->ecom_product->getTranslation('name') }}</a></strong>
                            <small>{{ $orderDetail->variation }}</small>
                          @else
                            <strong>{{ translate('Product Unavailable') }}</strong>
                          @endif
                        </td>
                        <td class="text-center">{{ $orderDetail->quantity }}</td>
                        <td class="text-center">{{ $orderDetail->points }}</td>
                      </tr>
                    @endforeach
        				</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="clearfix float-right">
    			<table class="table">
        			<tbody>
        			<tr>
        				<td>
        					<strong class="text-muted">{{translate('TOTAL POINTS')}} :</strong>
        				</td>
        				<td class="text-muted h5">
        					{{ $order->grand_total }}
        				</td>
        			</tr>
        			</tbody>
    			</table>
          <div class="text-right no-print">
            <a href="{{ route('user.invoice.download', $order->id) }}" type="button" class="btn btn-icon btn-light"><i class="las la-print"></i></a>
          </div>
    		</div>

    	</div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#update_delivery_status').on('change', function(){
            var order_id = {{ $order->id }};
            var status = $('#update_delivery_status').val();
            $.post('{{ route('orders.user_update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
            });
        });
    </script>
@endsection
