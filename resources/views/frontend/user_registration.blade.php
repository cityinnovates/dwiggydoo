@extends('frontend.layouts.app') @section('content')
<section class="login_page p-0">
    <div class="container-fluid px-lg-0">
        <div class="row no-gutters">
            <div class="col-lg-6"><img src="{{ asset('assets/images/login_image.jpg') }}" class="img-fluid w-100 h-100 object-cover" /></div>
            <div class="col-lg-6 align-self-center col-md-6 col-sm-8">
                <div class="px-lg-5 py-5 login-content billing-form">

			
                    <div class="categ-title mb-4"><h3>Register</h3></div>
						@foreach (session('flash_notification', collect())->toArray() as $message)
					<div class="alert alert-danger">{{ $message['message'] }}</div>
				@endforeach
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label>First Name</label> <input type="text" class="form-control rounded-0" name="name" /> 
								@if ($errors->has('name'))<span class="form_validation_error"><strong>{{ $errors->first('name') }}</strong></span> @endif
                            </div>
                            <div class="form-group col-12">
                                <label>Email</label> <input type="email" class="form-control rounded-0" name="email" /> 
								@if ($errors->has('email'))<span class="form_validation_error"><strong>{{ $errors->first('email') }}</strong></span> @endif
                            </div>
                            <div class="form-group col-12">
								<label>Mobile</label> 
								<input type="text" class="form-control rounded-0" name="phone" />
								@if ($errors->has('phone'))<span class="form_validation_error"><strong>{{ $errors->first('phone') }}</strong></span> @endif
							</div>
                            <div class="form-group col-6">
								<label>Password</label> 
								<input type="password" class="form-control rounded-0" name="password" />
								@if ($errors->has('password'))<span class="form_validation_error"><strong>{{ $errors->first('password') }}</strong></span> @endif
							</div>
                            <div class="form-group col-6">
								<label>Confirm Password</label> 
								<input type="password" class="form-control rounded-0" name="password_confirmation" />
								@if ($errors->has('password_confirmation'))<span class="form_validation_error"><strong>{{ $errors->first('password_confirmation') }}</strong></span> @endif
							</div>
                        </div>
                        <div class="form-row mt-4 pt-lg-1 align-items-center justify-content-between"><button type="submit" class="red-btn text-center text-uppercase">Register</button></div>
                    </form>
                    <div class="dont_have_account mt-5">
                        <p class="mb-0">Already have an account? <a href="{{ route('user.login') }}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
