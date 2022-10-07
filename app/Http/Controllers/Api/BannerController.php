<?php



namespace App\Http\Controllers\Api;


use Auth;
use Illuminate\Http\Request;
use Session;
use App\Http\Resources\BannerCollection;
use Illuminate\Support\Facades\DB;


class BannerController extends Controller

{



    public function index()

    {

        return new BannerCollection(json_decode(get_setting('home_banner1_images'), true));

    }
       public function request(Request $request)
    {
$user_id=$request->user_id;
$request = DB::table('connection')->where('send_to',$user_id)->where('status',1)->get();
        return $request;

    }
          public function breed()
    {

$request = DB::table('breed')->get();
        return $request;

    }

}

