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

      // $tokenResult = $user->createToken('Personal Access Client');
       $accessToken = bin2hex(random_bytes(64));
      // die('hi');

        return $this->loginSuccess($accessToken, $user);

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

                
                $users = User::where('id', $user->id)->update(array('otp_number' => $six_digit_random_number));
                $mobile=$request->phone;
               
        $body = "Dear ".$user->name.", 
Your OTP is ".$rand.". Use this Passcode to login to your account. 
Thank you
Dwiggy Doo Loves You";
			$mobile_number=$user->phone;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
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
                 $accessToken = bin2hex(random_bytes(64));
      // die('hi');

        return $this->loginSuccess($accessToken, $user);
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

                // 'email_verified_at' => Carbon::now()

            ]);

            // $user->balance = 250.00;
            $user->save();

           

        }

         $accessToken = bin2hex(random_bytes(64));
      // die('hi');

        return $this->loginSuccess($accessToken, $user);

    }



    protected function loginSuccess($accessToken, $user)

    {
      
       $users = User::where('id', $user->id)->update(array('acess_token' => $accessToken));

        return response()->json([

            'access_token' => $accessToken,

            'token_type' => 'Bearer',

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

