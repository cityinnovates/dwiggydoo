  <div class="modal fade" id="dynamicBackdrop" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bdr-none" id="modalconte">
        <div class="modal-header" style="border: none;">
          <h1 class="f-bold dd_heading f-40 color-27 text-center breed-ctn pos-rel w-100 text-center pt-4">Login Details.
          </h1>
          <span type="button" id="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </span>
        </div>
        <div class="modal-body px-md-5">
          <div class="dwiggy-form">
            <form action="{{ route('verifyotplogin') }}" method="POST">
              @csrf
              @foreach (session('flash_notification', collect())->toArray() as $message)
              <div class="alert alert-danger">{{ $message['message'] }}</div>
              @endforeach
              <div class="form-row login_pp">
                <div class="login_id ">
                  <div class="form-group" id="email">
                    <span class="f-18  color-27 f-medium mb-3 d-block" style="text-align: center">Enter Id or Phone Number</span>
                    <p style=" text-align: center; font-size: 10px ;margin-top: -15px;">We will send you the 4 digit verification code</p>

                    <input type="text" name="phone" id="phone" onblur="sendotp(this.value);" value="{{ old('mobile') }}"  required class="form-control f-14 f-reg color-7E" placeholder="Enter your Mobile or Emai id">
                    @if ($errors->has('mobile'))
                    <small id="emailvalid" class="form-text
                        text-danger invalid-feedback f-sbold">
                      {{ $errors->first('mobile') }}
                    </small>
                    @endif
                    <small id="emailvalid" class="form-text
                    text-danger invalid-feedback f-sbold">
                      Enter your email id must be a valid
                    </small>
                  </div>
                  <div class="form-group" id="ottp" style="display:none;">
                    <span class="f-18  color-27 f-medium mb-3 d-block" style="text-align: center"><b>OTP Verification</b></span>

                    <div class="container d-flex justify-content-center align-items-center">
                      <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                        <input class="m-2 text-center form-control rounded" placeholder="*" name='otp1' type="text" id="first" style="color: black;" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" name='otp2' placeholder="*" style="color: black;" id="second" placeholder="*" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" name='otp3' placeholder="*" style="color: black;" id="third" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" name='otp4' placeholder="*" style="color: black;" id="fourth" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" name='otp5' placeholder="*" style="color: black;" id="third" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" name='otp6' placeholder="*" style="color: black;" id="fourth" maxlength="1" />
                      </div>

                    </div>
                    <div class="container"><br>
                      <div class="row" style="margin-left: 60px; margin-right: -50px;">
                        <div class="col"> <a href="#" onclick="sendotpp();"> Resend OTP</a></div>
                        <!--<div class="col">  <a href="#">	0:20</a></div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" style="background-color:#f3735f;display:none;" id="submitbtn1" value="LOGIN" class="btn  w-100 bg-f3 color-fff">Login</button>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <p class="f-18 f-medium color-27 mb-3 w-100 text-center">or login with</p>
          <div class="login_with w-100 text-center mb-3">
            <a href="{{env('APP_URL')}}/login/instagram" class="mx-2"><img src="{{ route('home') }}/images/login_with/instagram.png"></a>
            <a href="{{env('APP_URL')}}//social-login/redirect/google" class="mx-2"><img src="{{ route('home') }}/images/login_with/google.png"></a>
            <a href="{{env('APP_URL')}}/social-login/redirect/facebook" class="mx-2"><img style="width: 30px;" src="{{ route('home') }}/images/login_with/fb.png"></a>
          </div>
        </div>
        <div class="login_cnt text-center pb-5">
          <p class="f-medium f-14 color-27">Don't have an account yet? <a href="{{env('APP_URL')}}/registers" class="color-f3 f-medium">Join Dwiggy Doo</a> </p>
          <p class="f-16 f-medium color-27 mb-3 w-100 text-center">NOT A PET OWNER?</p>

          <div class="container">
             <div class="login_cnt text-center">
              <a href="{{env('APP_URL')}}" class="color-f3 f-medium">
               <button type="submit" style="background-color:#f3735f;" class="btn  w-100 bg-f3 color-fff">Back To Home</button>
               </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



<!--------modal for otp--------->
  <div class="modal fade" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="otpmodal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bdr-none" id="modalconte">
        <div class="modal-header" style="border: none;">
          <h1 class="f-bold dd_heading f-40 color-27 text-center breed-ctn pos-rel w-100 text-center pt-4">Login Detail
          </h1>
          <span type="button" id="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </span>
        </div>
        <div class="modal-body px-md-5">
          <div class="dwiggy-form">
            <form>
              <div class="form-row login_pp">
                <div class="login_id ">
                  <div class="form-group">
                    <span class="f-18  color-27 f-medium mb-3 d-block" style="text-align: center"><b>OTP Verification</b></span>

                    <div class="container d-flex justify-content-center align-items-center">
                      <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                        <input class="m-2 text-center form-control rounded" placeholder="*" type="text" id="first" style="color: black;" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" placeholder="*" style="color: black;" id="second" placeholder="*" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" placeholder="*" style="color: black;" id="third" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" placeholder="*" style="color: black;" id="fourth" maxlength="1" />
                      </div>

                    </div>
                    <div class="container"><br>
                      <div class="row" style="margin-left: 60px; margin-right: -50px;">
                        <div class="col"> <a href="#"> Resend OTP</a></div>
                        <div class="col"> <a href="#"> 0:20</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dd_form_btn text-center login_pp_btn">
                <input type="submit" id="submitbtn" value="Request OTP" class="btn  w-100 bg-f3 color-fff">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <p class="f-18 f-medium color-27 mb-3 w-100 text-center">or login with</p>
          <div class="login_with w-100 text-center mb-3">
            <a href="#" class="mx-2"><img src="images/login_with/instagram.png"></a>
            <a href="#" class="mx-2"><img src="images/login_with/google.png"></a>
            <a href="{{env('APP_URL')}}/social-login/redirect/facebook" class="mx-2"><img src="images/login_with/fb.png"></a>
          </div>
        </div>
        <div class="login_cnt text-center pb-5">
          <p class="f-medium f-14 color-27">Don't have an account yet? <a href="#" class="color-f3 f-medium">Join Dwiggy Doo</a> </p>
          <p class="f-16 f-medium color-27 mb-3 w-100 text-center">NOT A PET OWNER?</p>

          <div class="container">
            <div class=" text-center " style="margin: 30px;">
              <input type="submit" id="submitbtn" value="Do Something good too" class="btn  w-100 bg-f3 color-fff">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>