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
          <div class="contentforprof">
            <b>Your Account</b>

            <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="photo" value="{{ Auth::user()->avatar_original }}">
            <div class="avatar-upload">
              <div class="avatar-edit fornew">
                <input type='file' id="imageUpload" name="myfile" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
              </div>
              <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url('{{ Auth::user()->avatar_original }}');">
                </div>
              </div>
            </div>
            <br><br id="res">
            <b >Personal Profile</b>


              <div class="row" style="margin-top: 20px;">
                <div class="col">
                  <label class="forlaell"><b>Name</b></label>
                  <input type="text" style="width: 85%;height: 40px;     background-color: white;
    border: 1px solid #c9c9c9;" name="name" value="{{ Auth::user()->name }}" required>
              </div>
                <div class="col">
                  <label class="forlaell"><b>Email Address</b></label>
                  <input type="text" style="width: 85%;height: 40px;     background-color: white;
    border: 1px solid #c9c9c9;" name="email"  value="{{ Auth::user()->email }}" required>
                </div>
              </div>
              <div class="row" style="margin-top: 20px;">
                <div class="col">
                  <label class="forlaell2"><b>Phone Number</b></label>
                  <input type="text" placeholder="e.g. 702 123 4567" style="width: 85%;height: 40px;     background-color: white;
    border: 1px solid #c9c9c9;"   pattern="[1-9]{1}[0-9]{9}" required  name="phone" value="{{ Auth::user()->phone }}" >
                </div>
                <div class="col">
                  <label class="forlaell">
                    <b>Select Location</b></label>
                    <select class="form-control" name="location_id"  data-live-search="true" required  style="width: 85%;height: 40px;">
                      <option value="">{{ ('Select Location') }}*</option>
                      @if(is_array($city) || ($city !=''))
                      @foreach($city as $citys)
                      <option  value="{{ $citys->id }}" <?= $citys->id == Auth::user()->location_id ? 'selected' : '' ;?>>{{ $citys->name}}</option>
                      @endforeach
                      @endif
                  </select>
                </div>
              </div>
              <div class="row" style="margin-top: 20px;">
                <div class="col">
                  <label class="forlaell"><b>Select Gender*</b></label>
                   <select required=""  name="gender" class="form-control" id="exampleFormControlSelect1" style="width: 85%;height: 40px;" required>
                    <option <?php  if(Auth::user()->gender==1){ echo "selected"; }  ?> value="1">Male</option>
                    <option <?php  if(Auth::user()->gender==2){ echo "selected"; }  ?> value="2">Female</option>
                    <option <?php  if(Auth::user()->gender==3){ echo "selected"; }  ?> value="3">Other</option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="profession_id" id="profession_id" data-live-search="true" required=""  style="width: 85%;height: 40px;">
                    <option value="">{{ ('Select Profession') }}*</option>
                    @foreach(App\Models\ProfessionCategory::all() as $key => $value)
                      <option value="{{$value->id}}" <?= $value->id == Auth::user()->profession_id ? 'selected' : '' ;?>>{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row" style="margin-top: 20px;">
                <div class="col">
                  <label class="forlaell"><b>Age</b></label>
                  <input type="text" id="age" name="age" placeholder="Age"   value="{{ Auth::user()->age }}" style="width: 85%;height: 40px;     background-color: white;
    border: 1px solid #c9c9c9;" required>
                </div>
                <div class="col">
                  <label class="forlaell"><b>Pincode</b></label>
                  <input type="text" name="postal_code" placeholder="Pincode"   value="{{ Auth::user()->postal_code }}" required style="width: 85%;height: 40px;     background-color: white;
    border: 1px solid #c9c9c9;">
                </div>
              </div>
              <hr>

            
            <br id="res">
            <b>Social Account</b>
            <!-- 
            <div class="row meff">
              <div class="col">
                <img SRC="{{ route('home') }}/images/1534129544.png"> <b>Sign in with Google </b>
              </div>
              <div class="col">
                <div class="righttree">
                  <input type="text" name="social_links[]" placeholder="">
                </div>
              </div>
            </div> -->
            <div class="row meff">
              <div class="col">
                <img SRC="{{ route('home') }}/images/facebook (1).png"> <b>Facebook </b>
              </div>
              <div class="col">
                  <input type="text" name="social_links[]" @if(Auth::user()->social_links) != null) value="{{ json_decode(Auth::user()->social_links)[0] }}" @endif class="form-control" placeholder="">
              </div>
            </div>
            <div class="row meff">
              <div class="col">
                <img SRC="{{ route('home') }}/images/logo-ig-png-instagram-logo-camel-productions-website-25.png"> <b>Instagram</b>
              </div>
              <div class="col">
               <!--  <input type="text" name="social_links[]" @if(Auth::user()->social_links) != null) value="{{ json_decode(Auth::user()->social_links)[1] }}" @endif  class="form-control" placeholder=""> -->
               <div class="righttree">
<button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style=" color: white; border-radius: 10px;">CONNECT</button>
</div>
              </div>
            </div>
<div class="col-md-12 text-center">
    <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style=" color: white; border-radius: 10px;">SAVE CHANGES</button>
        </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer_script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
<script>
    // International telephone format
// $("#phone").intlTelInput();
// get the country data from the plugin
var countryData = window.intlTelInputGlobals.getCountryData(),
  input = document.querySelector("#phone"),
  addressDropdown = document.querySelector("#address-country");

// init plugin
var iti = window.intlTelInput(input, {
  hiddenInput: "full_phone",
  utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
});

// populate the country dropdown
for (var i = 0; i < countryData.length; i++) {
  var country = countryData[i];
  var optionNode = document.createElement("option");
  optionNode.value = country.iso2;
  var textNode = document.createTextNode(country.name);
  optionNode.appendChild(textNode);
  addressDropdown.appendChild(optionNode);
}
// set it's initial value
addressDropdown.value = iti.getSelectedCountryData().iso2;

// listen to the telephone input for changes
input.addEventListener('countrychange', function(e) {
  addressDropdown.value = iti.getSelectedCountryData().iso2;
});

// listen to the address dropdown for changes
addressDropdown.addEventListener('change', function() {
  iti.setCountry(this.value);
});
</script>
@endsection