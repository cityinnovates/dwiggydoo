<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\DogWishlist;
use App\Models\Connection;
use App\Models\UserSetting;
use App\User;
use Auth;
use DB;
use App\Product;
use App\Category;

class UserDashboardController extends Controller{


    public function notification(){
        $rewards = DB::table('rewards')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
         $total_rewards = DB::table('rewards')->where('user_id', Auth::user()->id)->get()->sum('reward_point');
         $total_cr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'cr')->get()->sum('reward_point');
         $total_dr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'dr')->get()->sum('reward_point');
        return view('frontend.user.customer.notification', compact('rewards', 'total_cr', 'total_dr', 'total_rewards'));
    }

    public function redeem(){
      
      $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

      $rewards = DB::table('rewards')->where('user_id', Auth::user()->id);


      if($sort_by != null){
        switch ($sort_by) {
            case 'newest':
                $rewards->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $rewards->orderBy('created_at', 'asc');
                break;
            default:
                // code...
                break;
        }
      }else{
           $rewards->orderBy('created_at', 'desc');
      }

      $rewards = $rewards->paginate(10);
        
         $total_rewards = DB::table('rewards')->where('user_id', Auth::user()->id)->get()->sum('reward_point');
         $total_cr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'cr')->get()->sum('reward_point');
         $total_dr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'dr')->get()->sum('reward_point');
        return view('frontend.user.customer.redeem', compact('rewards', 'total_cr', 'total_dr', 'sort_by', 'total_rewards'));
    }

    public function user_privacy_policy(){
        return view('frontend.user.customer.privacy_policy');
    }

    public function user_coupons(){
        return view('frontend.user.customer.user_coupons');
    }

    public function user_terms_of_uses(){
        return view('frontend.user.customer.terms_of_uses');
    }

    public function user_help_support(){
        return view('frontend.user.customer.user_help_support');
    }

    public function user_address(){
        return view('frontend.user.customer.user_address');
    }

    public function dog_account(){
       
        $product = Product::where(['user_id'=>Auth::user()->id]);
        if(!empty($_GET['id'])){
          $product =$product->where('id', $_GET['id']);
        }
        $product =$product->get();
        $categories = Category::where('website_type',2)->get();
        $attributes = DB::table('breed')->orderBy('name', 'asc')->get();
        $city = DB::table('city')->orderBy('name', 'asc')->groupBy('name')->get();
        return view('frontend.user.customer.dog_account', compact('categories','attributes','city','product'));
    }

    public function user_connections_list(){

    $user_id=@Auth::user()->id;

    $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

    if($sort_by != null){
      switch ($sort_by) {
          case 'block':
               $connection_send_to = Connection::where(function($query){ $query->where('send_by', Auth::user()->id)->where('status', 1)->where('is_block', 1); })->orWhere(function($query2){ $query2->where('send_to', Auth::user()->id)->where('status', 1)->where('is_block', 1); })->get();
              break;
          default:
           $connection_send_to = Connection::where(function($query){ $query->where('send_by', Auth::user()->id)->where('status', 1)->where('is_block', 0); })->orWhere(function($query2){ $query2->where('send_to', Auth::user()->id)->where('status', 1)->where('is_block', 0); })->get();
              break;
      }
    }else{
      $connection_send_to = Connection::where(function($query){ $query->where('send_by', Auth::user()->id)->where('status', 1)->where('is_block', 0); })->orWhere(function($query2){ $query2->where('send_to', Auth::user()->id)->where('status', 1)->where('is_block', 0); })->get();
    }


    $pro1=array();
    foreach ($connection_send_to as $key => $value) {
        $pro1[]=$value->product_by;
        $con1[]=$value->id;
    } 

    $product1  = Product::whereIn('id', $pro1)->Where('website_type', 2);


    if(Auth::user()){  
      @$user_id=Auth::user()->id;
    } 
    
     @$connectionsd = Connection::where('send_by',$user_id)->where('status','1')->get();
     
     foreach($connectionsd as $key =>$value){
        @$send_too[]=@$value->send_to;
     }
     
    if(!isset($send_too)){
        $send_too[]='';
    }
    
    $products = Product::where(['published'=>1])->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too);
    
    $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';
      
      if($sort_by != null){
        switch ($sort_by) {
            case 'newest':
                $product1->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $product1->orderBy('created_at', 'asc');
                break;
            default:
                // code...
                break;
        }
      }else{
           $products = $products->inRandomOrder();
      }
      $products = $products->limit(8)->get();
      /*$product = $product->paginate(1);*/
      $product1 = $product1->paginate(10);
      return view('frontend.user.customer.user_connections_list', compact('products','product1', 'sort_by'));

    }

    public function user_setting(){
    	$setting = UserSetting::where('user_id', Auth::user()->id)->first();
        return view('frontend.user.customer.user_setting', compact('setting'));
    }
    public function user_setting_update(Request $request){

   		if($request->has('is_have')){
   			foreach($request->user_setting_id as $key => $value){
		    	$setting = UserSetting::where('user_id', Auth::user()->id)->where('setting_option', $value)->first();
  				if($request['phone_'.$value] == 'on' || $request['phone_'.$value] == 1){
   					$setting->is_phone = 1;
   				}else{
   					$setting->is_phone = 0;
   				}
   				if($request['mail_'.$value] == 'on' || $request['mail_'.$value] == 1){
   					$setting->is_mail = 1;
   				}else{
   					$setting->is_mail = 0;
   				}
   				$setting->save();
		    }
   		}else{
   			
   			foreach($request->user_setting_id as $key => $value){
   				$setting = new UserSetting;
   				$setting->user_id = Auth::user()->id;
   				if($request['phone_'.$value] == 'on' || $request['phone_'.$value] == 1){
   					$setting->is_phone = 1;
   				}else{
   					$setting->is_phone = 0;
   				}
   				if($request['mail_'.$value] == 'on' || $request['mail_'.$value] == 1){
   					$setting->is_mail = 1;
   				}else{
   					$setting->is_mail = 0;
   				}
   				$setting->setting_option = $value;
   				$setting->save();
   			}
   		}

    	return back()->with('success', 'Successfully update Data');

    }

}