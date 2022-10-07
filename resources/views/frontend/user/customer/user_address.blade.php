@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">
@endsection

@section('content')
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        @include('frontend.inc.user_top_bar')
        <div>
        	@include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">
              @foreach (Auth::user()->addresses as $key => $address)
              <div class="contentforprof2" >
                 <input type="radio" name="address_id" onclick="set_default_address({{ $address->id }});" value="{{ $address->id }}" @if ($address->set_default) checked @endif required>

                <div class="contererw">
                  <div class="namefordas">
                    <p><b>{{ $address->country }}</b></p>

                  </div>
                  <div class="adddre">
                    <p>{{ $address->city }}, {{ $address->address }}, {{ $address->postal_code }}</p>
                  </div>
                  <div class="phoneforadd">
                    <p>Mobile: {{ $address->phone }}</p>
                  </div>
                </div>  <br>
                <div class="row" style="border-top: 1px solid rgb(202, 198, 198);">
                  <div class="col d-flex justify-content-center"style="border-right: 1px solid rgb(202, 198, 198);"><a style="color: #58bed7; margin: 10px;"  data-toggle="modal" data-target="#editAddressModels<?=$key?>"><b>EDIT</b></a></div>
                  <div class="col d-flex justify-content-center"><a style="color: #58bed7; margin: 10px;" onclick="delete_alert({{ $address->id }})"><b>Remove</b></a></div>
                </div>  
              </div><br>

              <!-- Modal -->
              <div class="modal fade" id="editAddressModels<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="addressModelsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editAddressModelsTitle<?=$key?>">Edit Address</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         
                          <form class="form-default" id="address_form" role="form" action="{{ route('addresses.update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $address->id }}">
                              <div class="modal-body">
                                  <div class="p-3">
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label>{{ translate('Address')}}</label>
                                          </div>
                                          <div class="col-md-10">
                                              <textarea class="form-control textarea-autogrow mb-3" placeholder="{{ translate('Your Address')}}" rows="1" name="address" required>{{ $address->address }}</textarea>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label>{{ translate('Country')}}</label>
                                          </div>
                                          <div class="col-md-10">
                                              <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
                                                  @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                                      <option value="{{ $country->name }}" <?= $country->name == $address->country ? 'selected' : ''; ?>>{{ $country->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label>{{ translate('City')}}</label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="{{ translate('Your City')}}" name="city" value="{{ $address->city }}" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label>{{ translate('Postal code')}}</label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="{{ translate('Your Postal Code')}}" name="postal_code" value="{{ $address->postal_code }}" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-2">
                                              <label>{{ translate('Phone')}}</label>
                                          </div>
                                          <div class="col-md-10">
                                              <input type="text" class="form-control mb-3" placeholder="{{ translate('+(91)')}}" name="phone" value="{{ $address->phone }}" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-9"></div>
                                          <div class="col-md-3">
                                             <button type="submit" class="btn btn-primary">{{  translate('Update') }}</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                    </div>
                  </div>
                </div>
              </div>
             @endforeach
              <div class="col-md-12 text-center"><br>
                <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="color: white; border-radius: 10px;" data-toggle="modal" data-target="#addressModels"> + Add New Address</button>
              </div>
    		</div>
        </div>
    </div>
</div>

@endsection

@section('modal')

<!-- Modal -->
<div class="modal fade" id="addressModels" tabindex="-1" role="dialog" aria-labelledby="addressModelsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModelsTitle">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
            <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Address')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="{{ translate('Your Address')}}" rows="1" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Country')}}</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
                                    @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('City')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('Your City')}}" name="city" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Postal code')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('Your Postal Code')}}" name="postal_code" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Phone')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('+(91)')}}" name="phone" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                               <button type="submit" class="btn btn-primary">{{  translate('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>



@endsection
@section('footer_script')

<script type="text/javascript">
  function delete_alert(id){
    if (confirm("Are you sure?")) {
        window.location.href = "{{ route('home') }}/addresses/destroy/" + id;
    }
    return false;
  }
  function set_default_address(id){
    if (confirm("Are you sure?")) {
        window.location.href = "{{ route('home') }}/addresses/set_default/" + id;
    }
    return false;
  }
  function edit_address(id){
    $('#address_form')[0].reset();
    $.ajax({
      url: "{{ route('home') }}/addresses/edit/" + id,
      type: "GET",
      data: { id: id},
      success: function(data){

        var keys = $.parseJSON(data);
        $.each(keys, function(key, value){
            $('input[name="id"]').val(value.id);
            $('input[name="country"]').val(value.country);
            $('input[name="city"]').val(value.city);
            $('input[name="address"]').val(value.address);
            $('input[name="postal_code"]').val(value.postal_code);
            $('input[name="phone"]').val(value.phone);
        });
      }
    });
    $('#editAddressModels').modal('show');
  }
</script>

@endsection
