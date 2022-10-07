<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Socialite;

use App\User;

use App\Customer;

use Illuminate\Http\Request;

use CoreComponentRepository;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
// use Auth;
use GuzzleHttp\Client;


class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    /*protected $redirectTo = '/';*/





    /**

      * Redirect the user to the Google authentication page.

      *

      * @return \Illuminate\Http\Response

      */




public function redirectToInstagramProvider()
{
    $appId = config('services.instagram.client_id');
    $redirectUri = urlencode(config('services.instagram.redirect'));
    return redirect()->to("https://api.instagram.com/oauth/authorize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code");
}

public function instagramProviderCallback(Request $request)
{

    $code = $request->code;
    if (empty($code)) return redirect()->route('home')->with('error', 'Failed to login with Instagram.');

    $appId = config('services.instagram.client_id');
    $secret = config('services.instagram.client_secret');
    $redirectUri = config('services.instagram.redirect');

    $client = new Client();

    // Get access token
    $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
        'form_params' => [
            'app_id' => $appId,
            'app_secret' => $secret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectUri,
            'code' => $code,
        ]
    ]);

    if ($response->getStatusCode() != 200) {
        return redirect()->route('home')->with('error', 'Unauthorized login to Instagram.');
    }

    $content = $response->getBody()->getContents();
    $content = json_decode($content);

    $accessToken = $content->access_token;
    $userId = $content->user_id;

    // Get user info
    $response = $client->request('GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}");

    $content = $response->getBody()->getContents();
    $oAuth = json_decode($content);
    // print_r($oAuth);

    // Get instagram user name 
     $username = $oAuth->username;
      $userid = $oAuth->id;


    $users = DB::table('users')->where('provider_id',$userid)->where('type','instagram')->first(); 
    if(empty($users))
    {

         $users=DB::table('users')->insert(
        ['provider_id' => $userid, 'name' => $username, 'type' => 'instagram']
        );

        if (Auth::loginUsingId($users->id)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
   return redirect()->intended('home');
    }
    else
    {
        if (Auth::loginUsingId($users->id)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
   return redirect()->intended('home');   
    }
    // do your code here
}

    public function redirectToProvider($provider)

    {

        return Socialite::driver($provider)->redirect();

    }



    /**

     * Obtain the user information from Google.

     *

     * @return \Illuminate\Http\Response

     */

    public function handleProviderCallback(Request $request, $provider)

    {

        try {

            if($provider == 'twitter'){

                $user = Socialite::driver('twitter')->user();

            }

            else{

                $user = Socialite::driver($provider)->stateless()->user();

            }

        } catch (\Exception $e) {

            flash("Something Went wrong. Please try again.")->error();

            return redirect()->route('user.login');

        }


        // check if they're an existing user

        $existingUser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();



        if($existingUser){

            // log them in

            auth()->login($existingUser, true);

        } else {

            // create a new user

            $newUser                  = new User;

            $newUser->name            = $user->name;

            $newUser->email           = $user->email;

            $newUser->email_verified_at = date('Y-m-d H:m:s');

            $newUser->provider_id     = $user->id;



            // $extension = pathinfo($user->avatar_original, PATHINFO_EXTENSION);

            // $filename = 'uploads/users/'.Str::random(5).'-'.$user->id.'.'.$extension;

            // $fullpath = 'public/'.$filename;

            // $file = file_get_contents($user->avatar_original);

            // file_put_contents($fullpath, $file);

            //

            // $newUser->avatar_original = $filename;

            $newUser->save();



            $customer = new Customer;

            $customer->user_id = $newUser->id;

            $customer->save();



            auth()->login($newUser, true);

        }

        if(session('link') != null){

            return redirect(session('link'));

        }

        else{

            return redirect()->route('dashboard');

        }

    }



    /**

        * Get the needed authorization credentials from the request.

        *

        * @param  \Illuminate\Http\Request  $request

        * @return array

        */

       protected function credentials(Request $request)

       {

           if(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){

               return $request->only($this->username(), 'password');

           }

           return ['phone'=>$request->get('email'),'password'=>$request->get('password')];

       }



    /**

     * Check user's role and redirect user based on their role

     * @return

     */

    public function authenticated()

    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')

        {

           // CoreComponentRepository::instantiateShopRepository();

            return redirect()->route('admin.dashboard');

        } else {



            if(session('link') != null){

                return redirect(session('link'));

            }

            else{

                return redirect()->route('profiles');

            }

        }

    }



    /**

     * Get the failed login response instance.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Symfony\Component\HttpFoundation\Response

     *

     * @throws \Illuminate\Validation\ValidationException

     */

    protected function sendFailedLoginResponse(Request $request)

    {

        flash(translate('Invalid email or password'))->error();

        return  Redirect::to(URL::previous() . "@popup");
    }



    /**

     * Log the user out of the application.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function logout(Request $request)

    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')){

            $redirect_route = 'login';

        }

        else{

            $redirect_route = 'home';

        }



        $this->guard()->logout();



        $request->session()->invalidate();



        return $this->loggedOut($request) ?: redirect()->route($redirect_route);

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

}

