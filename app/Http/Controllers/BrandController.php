<?php



namespace App\Http\Controllers\Api;



use App\Http\Resources\BrandCollection;

use App\Models\Brand;


use App\User;

class BrandController extends Controller

{

    public function signups(Request $request)

    {

        $request->validate([

            'name' => 'required|string',

            'email' => 'required|string|email|unique:users',

            'password' => 'required|string|min:6'

        ]);

        $user = new User([

            'name' => $request->name,

            'email' => $request->email,

            'password' => bcrypt($request->password)

        ]);

        $user->save();
 

        return response()->json([

            'message' => 'Registration Successful. Please verify and log in to your account.'

        ], 201);

    }



    public function logins(Request $request)

    {

        $request->validate([

            'email' => 'required|string|email',

            'password' => 'required|string',

            'remember_me' => 'boolean'

        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))

            return response()->json(['message' => 'Unauthorized'], 401);

        $user = $request->user();

        if($user->email_verified_at == null){

            return response()->json(['message' => 'Please verify your account'], 401);

        }

        $tokenResult = $user->createToken('Personal Access Token');

        return $this->loginSuccess($tokenResult, $user);

    }


    public function index()

    {

        return new BrandCollection(Brand::all());

    }



    public function top()

    {

        return new BrandCollection(Brand::where('top', 1)->get());

    }

}

