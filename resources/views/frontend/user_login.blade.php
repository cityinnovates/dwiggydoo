@extends('frontend.layouts.app')

@section('content')
   <section class="login_page p-0">
    <div class="container-fluid px-lg-0">
        <div class="row no-gutters">
            <div class="col-lg-6"><img src="{{ asset('assets/images/login_image.jpg') }}" class="img-fluid w-100 h-100 object-cover" /></div>
            <div class="col-lg-6 align-self-center col-md-6 col-sm-8">
                <div class="px-lg-5 py-5 login-content billing-form">
                    <div class="categ-title mb-4"><h3>Login</h3></div>
@foreach (session('flash_notification', collect())->toArray() as $message)
<div class="alert alert-danger">{{ $message['message'] }}</div>
@endforeach
                    <form action="{{ route('login') }}" method="POST">
					@csrf
                        <div class="form-group"><label>Username</label>
						<input type="text" class="form-control rounded-0" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email"/>
						@if ($errors->has('email'))<span class="form_validation_error"><strong>{{ $errors->first('email') }}</strong></span> @endif
						</div>
                        <div class="form-group"><label>Password</label>
						<input type="password" class="form-control rounded-0" placeholder="{{ translate('Password')}}" name="password" id="password" />
						@if ($errors->has('email'))<span class="form_validation_error"><strong>{{ $errors->first('password') }}</strong></span> @endif
						</div>
                        <div class="form-row mt-4 pt-lg-1 align-items-center justify-content-between">
                            <button type="submit" style="background: #008bb7;color: white;" class="red-btn text-center text-uppercase">Login</button>
							<!-- <a href="{{ route('password.request') }}" class="forgot_password">Forgot Password?</a> -->
                        </div>
                    </form>
                    <div class="dont_have_account mt-5">
                        <!-- <p class="mb-0">Don’t have an account? <a href="{{ route('user.registration') }}">Create an Account</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
