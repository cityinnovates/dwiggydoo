<?php



namespace App\Http\Controllers\Auth;



use App\User;

use App\Customer;

use App\BusinessSetting;

use App\OtpConfiguration;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OTPVerificationController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Cookie;
use Nexmo;
use Twilio\Rest\Client;

class RegisterController extends Controller{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;
    /**

     * Where to redirect users after registration.

     *

     * @var string

     */

    protected $redirectTo = '/';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return \App\User

     */

    protected function create(array $data){

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $user = User::create([
                // 'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $customer = new Customer;
            $customer->user_id = $user->id;
            $customer->save();
        }
        else {
            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated){
                $user = User::create([
                    'name' => $data['name'],
                    'phone' => '+'.$data['country_code'].$data['phone'],
                    'password' => Hash::make($data['password']),
                    'verification_code' => rand(100000, 999999)
                ]);

                $customer = new Customer;
                $customer->user_id = $user->id;
                $customer->save();
                $otpController = new OTPVerificationController;
                $otpController->send_code($user);
            }

        }

        if(Cookie::has('referral_code')){
            $referral_code = Cookie::get('referral_code');
            $referred_by_user = User::where('referral_code', $referral_code)->first();
            if($referred_by_user != null){
                $user->referred_by = $referred_by_user->id;
                $user->save();
            }
        }
        return $user;

    }



    public function register(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if(User::where('email', $request->email)->first() != null){
                flash(translate('Email already exists.'));
                return back()->with('error', 'Email already exists.');
            }
        }
        elseif (User::where('phone',$request->phone)->where('phone',$request->mobile)->first() != null) {
            flash(translate('Phone already exists.'));
            return back()->with('error', 'Phone already exists.');
        }
    $mobile=$request->mobile; 
    $users = DB::table('users')->where('phone',$mobile)->first();

    if(!empty($users))
    {
        $rand=random_int(100000, 999999);
        $iddd=DB::table('users')->where('id',$users->id)->update(['otp_number' => $rand]);

        $body = "Dear ".$users->name.", 
        Your OTP is ".$rand.". Use this Passcode to login to your account. 
        Thank you
        Dwiggy Doo Loves You";
		
        $mobile_number=$users->phone;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
		$response = curl_exec($ch);
		curl_close($ch);
		
      echo "OTP Succesfully Sent To Your Registered Mobile Number ";

    }else{
        
        $mobile=$request->mobile; 
        $email=$request->email; 
        $name=$request->name; 
              
        $rand=random_int(100000, 999999);
        $iddd=DB::table('users')->insertGetId(['otp_number'=> $rand,'phone'=> $mobile,'email'=> $email,'name'=> $name]);
        $body = "Dear ".$request->name.", 
        Your OTP is ".$rand.". Use this Passcode to login to your account. 
        Thank you
        Dwiggy Doo Loves You";
		
        $mobile_number=$request->mobile;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
		$response = curl_exec($ch);
		curl_close($ch);

        echo "OTP Succesfully Sent To Your Registered Mobile Number";
    }
    
    flash(translate('Registration successfull.'))->success();
    
    return redirect('regotp/'.$iddd)->with('success', 'OTP Succesfully Sent To Your Mobile Number.');
    
    if($user->email != null){
        if(BusinessSetting::where('type', 'email_verification')->first()->value != 1){
            $user->email_verified_at = date('Y-m-d H:m:s');
            $user->save();
            flash(translate('Registration successfull.'))->success();
        }else {
            event(new Registered($user));
            flash(translate('Registration successfull. Please verify your email.'))->success();
        }
    }
    return $this->registered($request, $user)->with('success', 'Registration successfull.') ? : redirect($this->redirectPath())->with('error', 'Registration successfull. Please verify your email.');

    }



    protected function registered(Request $request, $user){
        if ($user->email == null) {
            return redirect()->route('verification');
        }else {
            return redirect()->route('profiles');
        }

    }

}

