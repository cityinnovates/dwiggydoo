<?php /** @noinspection PhpUndefinedClassInspection */



namespace App\Http\Controllers\Api;



use App\Models\BusinessSetting;

use App\Models\Customer;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\User;
// use App\Wallet;

use App\Notifications\EmailVerificationNotification;

use db;
// use App\Models\DeliveryBoyTracking;
// use Mail;
// use App\Mail\CommonEmailManager;


class AuthController extends Controller

{

    public function signup(Request $request)

    {
        $user_type = 'customer';
        $request->validate([

            'name' => 'required|string',

            'email' => 'required|string|email',

            'password' => 'required|string|min:6'

        ]);
        $dd=User::where('email',$request->email)->first();
        // die('jii');
        if(!empty($dd)){
                return response()->json(['message' => 'Email already exists.'], 201);
            }
      
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $user_type,
            'phone' => $request->phone,
        ]);
 
       
        $user->save();


       
        return response()->json([

            'message' => 'Registration Successful. Please verify and log in to your account.'

        ], 201);

    }



    public function login(Request $request)

    {

        $request->validate([

            'email' => 'required|string|email',

            'password' => 'required|string',

            //'remember_me' => 'boolean'

        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))

            return response()->json(['message' => 'Unauthorized'], 401);

        $user = $request->user();

        // if($user->email_verified_at == null){

        //     return response()->json(['message' => 'Please verify your account'], 401);

        // }

        $tokenResult = $user->createToken('Personal Access Token');
        return $this->loginSuccess($tokenResult, $user);

    /*  $user = User::where('email', $request->email)->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){

                    auth()->login($user, true);
                echo 'Invalid email or passsword!';
        $tokenResult = $user->createToken('Personal Access Token');
        return $this->loginSuccess($tokenResult, $user);

            }
            else {
                flash(translate('Invalid email or password!'))->warning();
            }
        }*/
    }



    public function loginSendOtp(Request $request)
    {
        if(User::where('phone', $request->phone)->first() == null){
                return response()->json(['message' => 'Phone Number Not Registered.'], 201);
            }
            else
            {
                $user=User::where('phone', $request->phone)->first();
                $six_digit_random_number = random_int(100000, 999999);
                $users = User::where('id', $user->id)->update(array('otp_verify' => $six_digit_random_number));
                $mobile=$request->phone;
                $text = 'Your Otp is '.$six_digit_random_number.'. Thank you for connect with us. For any help, please contact us at '.get_setting('contact_phone');
              
                return response()->json(['user_id' => $user->id,'text'=>$text], 200);
            }
    }
    public function verifyOtp(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        if($user->otp_verify != $request->otp){
                return response()->json(['message' => 'Invalid OTP'], 201);
            }
            else
            {
                $tokenResult = 'hiii';
                return $this->loginSuccess($tokenResult, $user);
            }
    }

    public function loginSendOtp(Request $request)
    {
        if(User::where('phone', $request->phone)->first() == null){
                return response()->json(['message' => 'Phone Number Not Registered.'], 201);
            }
            else
            {
                $user=User::where('phone', $request->phone)->first();
                $six_digit_random_number = random_int(100000, 999999);
                $users = User::where('id', $user->id)->update(array('otp_verify' => $six_digit_random_number));
                $mobile=$request->phone;
                $text = 'Your Otp is '.$six_digit_random_number.'. Thank you for connect with us. For any help, please contact us at '.get_setting('contact_phone');
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile&message=$text");
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['user_id' => $user->id], 200);
            }
    }
    public function verifyOtp(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        if($user->otp_verify != $request->otp){
                return response()->json(['message' => 'Invalid OTP'], 201);
            }
            else
            {
                $tokenResult = $user->createToken('Personal Access Token');
                return $this->loginSuccess($tokenResult, $user);
            }
    }

    public function user(Request $request)

    {

        return response()->json($request->user());

    }



    public function logout(Request $request)

    {

        $request->user()->token()->revoke();

        return response()->json([

            'message' => 'Successfully logged out'

        ]);

    }



    public function socialLogin(Request $request)

    {

        $request->validate([

            'email' => 'required|string|email'

        ]);

        if (User::where('email', $request->email)->first() != null) {

            $user = User::where('email', $request->email)->first();

        } else {

            $user = new User([

                'name' => $request->name,

                'email' => $request->email,

                'provider_id' => $request->provider,

                'email_verified_at' => Carbon::now()

            ]);

            $user->balance = 250.00;
            $user->save();

            $customer = new Customer;

            $wallets = new Wallet;
            $wallets->user_id = $user->id;
            $wallets->amount = 250.00;
            $wallets->payment_method = 'Points';
            $wallets->payment_details = 'Sign Up Bonus';
            $wallets->save();

            $customer->user_id = $user->id;
         
            $customer->save();

        }

        $tokenResult = $user->createToken('Personal Access Token');

        return $this->loginSuccess($tokenResult, $user);

    }



    protected function loginSuccess($tokenResult, $user)

    {

        $token = $tokenResult->token;

        $token->expires_at = Carbon::now()->addWeeks(100);

        $token->save();

        return response()->json([

            'access_token' => $tokenResult->accessToken,

            'token_type' => 'Bearer',

            'expires_at' => Carbon::parse(

                $tokenResult->token->expires_at

            )->toDateTimeString(),

            'user' => [

                'id' => $user->id,

                'type' => $user->user_type,

                'name' => $user->name,

                'email' => $user->email,

                'avatar' => $user->avatar,

                'avatar_original' => $user->avatar_original,

                'address' => $user->address,

                'country'  => $user->country,
                'balance'  => $user->balance,

                'city' => $user->city,

                'postal_code' => $user->postal_code,

                'phone' => $user->phone

            ]

        ]);

    }

}

