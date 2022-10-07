<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Hash;
use App\Category;
use App\Models\DogWishlist;
use App\Models\Connection;
use App\FlashDeal;
use App\Brand;
use App\Product;
use App\PickupPoint;
use App\CustomerPackage;
use App\CustomerProduct;
use App\Models\Rewards;
use App\Models\RewardQuestion;
use App\Models\RewardQuestionAttempt;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\Slider;
use App\BusinessSetting;
use App\Http\Controllers\SearchController;
use ImageOptimizer;
use Cookie;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use App\Utility\TranslationUtility;
use App\Utility\CategoryUtility;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(){

        $product = Product::where(['published'=>1])->Where('website_type', 2)->limit(20)->get();
        return view('frontend.index',compact('product'));
    }

    /*public function registration(Request $request){
        if(!Auth::check()){
            return redirect()->route('home');
        }
        if($request->has('referral_code')){
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration');
    }*/

    public function registers(){
          if(Auth::check()){
            return redirect()->route('profiles');
        }
        return view('frontend.register_owner');
    }

    public function profiles(){

        $product = Product::where(['user_id'=>Auth::user()->id])->get();
         $categories = Category::where('website_type',2)->get();
        $attributes = DB::table('breed')->orderBy('name', 'asc')->get();
        $city = DB::table('city')->orderBy('name', 'asc')->groupBy('name')->get();
        return view('frontend.register_dog', compact('categories','attributes','city','product'));
       
    }

    public function login(){
       // dd("test");
        if(Auth::check()){
        //return redirect()->route('home');
		return redirect()->route('admin.dashboard');
           
        }
		// return redirect()->route('login');
        return view('frontend.user_login');
    }

    public function aboutus(){
        $about = DB::table('pages')->where('type','about_us_page')->first();
        $uploads = DB::table('uploads')->where('id',$about->banner_image)->first();
        $file_name=$uploads->file_name;
        return view('frontend.pages.aboutus',compact('about','file_name'));           
    }

    
    public function term(){
        return view('frontend.pages.term');           
    }

    public function contact(){
        return view('frontend.pages.contact');           
    }

    public function privacy(){
        return view('frontend.pages.privacy');           
    }


    public function social(){
        if(!Auth::check()){
            return redirect()->route('home');
        }

        $socialy = DB::table('pages')->where('type','socials_page')->first();
        $uploady = DB::table('uploads')->where('id',$socialy->banner_image)->first();
        $file_namey=$uploady->file_name;

        $social = DB::table('pages')->where('type','social_page')->first();
        $uploads = DB::table('uploads')->where('id',$social->banner_image)->first();
        $file_name=$uploads->file_name;

        $product = Product::where(['published'=>1])->Where('website_type', 2)->paginate(8);
        $socials = DB::table('socials')->where('end_time','>=',time())->get();   
        return view('frontend.social',compact('socials','product','social','file_name','socialy','file_namey')); 
    }

    public function human_advice(){
        $blogs = DB::table('blog_pages')->get();
        $human_advice_one = DB::table('human_advice')->where('id',3)->first();
        $uploady = DB::table('uploads')->where('id',$human_advice_one->banner_image)->first();

        $file_namey=$uploady->file_name;
        $human_advice_two = DB::table('human_advice')->where('id',4)->first();
        $uploadyy = DB::table('uploads')->where('id',$human_advice_two->banner_image)->first();

        $file_nameyy=$uploadyy->file_name;
        $human_advice_post = DB::table('human_advice_post')->first();
        $human_advice_questionare = DB::table('human_advice_questionare')->first();
        return view('frontend.human_advice',compact('blogs','human_advice_one','human_advice_two','human_advice_post','human_advice_questionare','file_namey','file_nameyy'));
    }

    public function dog_advice(){
        $blogs = DB::table('blog_pages')->get();
        $dog_advice_one = DB::table('dog_advice')->where('id',3)->first();
        $uploady = DB::table('uploads')->where('id',$dog_advice_one->banner_image)->first();

        $file_namey=$uploady->file_name;
        $dog_advice_two = DB::table('dog_advice')->where('id',4)->first();
        $uploadyy = DB::table('uploads')->where('id',$dog_advice_two->banner_image)->first();

        $file_nameyy=$uploadyy->file_name;
        $dog_advice_post = DB::table('dog_advice_post')->first();
        $dog_advice_questionare = DB::table('dog_advice_questionare')->first();
             
        return view('frontend.dogs_advice',compact('blogs','dog_advice_one','dog_advice_two','dog_advice_post','dog_advice_questionare','file_namey','file_nameyy'));
    }


    public function blogs(){
        $blogs = DB::table('blog_pages')->paginate(2);
        $blogss = DB::table('blogslider')->get();
        return view('frontend.all-blogs',compact('blogs','blogss'));
    }

    public function blogsdetails($id){
        $blogsss = DB::table('blog_pages')->whereNotIn('id',[$id])->orderBy('id','DESC')->limit(3)->get();
        $blogs = DB::table('blog_pages')->where('id',$id)->get();
       
        return view('frontend.blogsdetails',compact('blogs','blogsss','id'));
    }

    public function sendotptomobile(Request $request){
        $mobile=$request->mobile; 
        $users = DB::table('users')->where('phone',$mobile)->first();
        if(!empty($users)){
            $rand=random_int(100000, 999999);
            DB::table('users')->where('id',$users->id)->update(['otp_number' => $rand]);
            $body = "Dear ".$users->name.", Your OTP is ".$rand.". Use this Passcode to login to your account. Thank youDwiggy Doo Loves You";
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
            echo "This number is not registered with us.";
        }
    }


    public function sendotptomobiler(Request $request){
        $mobile=$request->mobile; 
        $users = DB::table('users')->where('phone',$mobile)->first();
        if(!empty($users)){

            $rand=random_int(100000, 999999);
            DB::table('users') ->where('id',$users->id)->update(['otp_number' => $rand]);
            $body = "Dear ".$users->name.", Your OTP is ".$rand.". Use this Passcode to login to your account. Thank youDwiggy Doo Loves You";
            $mobile_number=$users->mobile;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
            $response = curl_exec($ch);
            curl_close($ch);
             echo "OTP Succesfully Sent To Your Registered Mobile Number ";

        } else{
            $mobile=$request->mobile; 
            $email=$request->email; 
            $name=$request->name; 
                  
            $rand=random_int(100000, 999999);
            DB::table('users')->insert(['otp_number'=> $rand,'phone'=> $mobile,'email'=> $email,'name'=> $name]);
            $body = "Dear ".$users->name.", Your OTP is ".$rand.". Use this Passcode to login to your account. Thank youDwiggy Doo Loves You";
            $mobile_number=$users->mobile;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
            $response = curl_exec($ch);
            curl_close($ch);
            
            echo "OTP Succesfully Sent To Your Registered Mobile Number ";
        }
    }


    public function verifyotpregister(Request $request){
        $mobile=$request->uid; 
        $otp1=$request->otp1;
        $otp2=$request->otp2;
        $otp3=$request->otp3;
        $otp4=$request->otp4; 
        $otp5=$request->otp5;
        $otp6=$request->otp6;

        $otp=$otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
        if(filter_var($mobile, FILTER_VALIDATE_EMAIL)) {
            $users = DB::table('users')->where('id',$mobile)->where('otp_number',$otp)->first();
        } else {
            $users = DB::table('users')->where('id',$mobile)->where('otp_number',$otp)->first();
        }   
        if(!empty($users)) { 
            if (Auth::loginUsingId($users->id)) {
                return redirect()->intended('user/dashboard')->with('success', 'Signed in');
            }
            return redirect()->intended('user/dashboard');
        } else {
            return back()->with('error', 'Wrong OTP & Invalid detail.');
        }

    }  
      
    public function sendotptoemail(Request $request){
        $email=$request->email; 
        $users = DB::table('users')->where('email',$email)->first();
        if(!empty($users)){
            $rand=random_int(100000, 999999);
            DB::table('users')->where('id',$users->id)->update(['otp_number' => $rand]);
            $user_email=$users->email;
            Mail::send('frontend.email_otp', array('otp' => $rand,), function($message) use ($request,$user_email){
                $message->from(env('MAIL_USERNAME'));
                $message->to($user_email);
                $message->subject("Dwiggydoo OTP");
               
            });
            echo "OTP Succesfully Sent To Your Registered Email Id ";

        } else {
        echo "This Email id is not registered with us.";
        }
    }


    public function sendotptomobiletest(){
        $body = "Dear Ankit, Your OTP is 111121 Use this Passcode to login to your account. Thank youDwiggy Doo Loves You";
        $mobile_number=9654215063;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "http://justgosms.com/http-api.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=cityinnovates&password=123456&senderid=ANKSMS&route=1&number=$mobile_number&message=$body");
        $response = curl_exec($ch);
        curl_close($ch);
        print_r($ch);
    }



    public function regotp($id){   
        if(Auth::check()){
            return redirect()->route('profiles');
        }
        return view('frontend.register_owner_otp');
    }


    public function verifyotplogin(Request $request){
        $mobile=$request->phone; 
        $otp1=$request->otp1;
        $otp2=$request->otp2;
        $otp3=$request->otp3;
        $otp4=$request->otp4; 
        $otp5=$request->otp5;
        $otp6=$request->otp6;
        
        $otp=$otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
    
        if(filter_var($mobile, FILTER_VALIDATE_EMAIL)) {
            $users = DB::table('users')->where('email',$mobile)->where('otp_number',$otp)->first();
        }else {
            $users = DB::table('users')->where('phone',$mobile)->where('otp_number',$otp)->first();
        } 

        if(!empty($users)){

            if (Auth::loginUsingId($users->id)) {
                return redirect()->intended('user/dashboard')
                            ->with('success', 'Signed in');
            }
            return redirect()->intended('user/dashboard');
        } else {
            flash("Invalid detail.")->error();
            return Redirect::to('/login@popup')->with('error', 'Invalid detail.'); 
        }
    }



    public function all_connections(Request $request){
        @$breed=$_GET['breed'];
         
        @$city=$_GET['city'];
        if(@$breed!=''){      
            $breads = DB::table('breed')->Where('name', 'like','%'.$breed.'%')->first();
            if(empty($breads)){
                $breadssss=9999999999;
            }else{
                $breadssss=$breads->id;
            }
        }

        if(@$city!=''){
            $citys = DB::table('city')->Where('name', 'like','%'.$city.'%')->first();
        }
   

        if(Auth::user()){  
            @$user_id=Auth::user()->id;
        } 
    
    
        @$connectionsd = DB::table('connection')->where('send_by',$user_id)->where('status','1')->get();
     
         foreach($connectionsd as $key =>$value){
            @$send_too[]=@$value->send_to;
          
         }
    
        if(!isset($send_too)){
            $send_too[]='';
        }
    
    
    
        if(@$user_id!=''){

            if(!empty($citys)&&!empty($breads))
            $product = Product::Where('brand_id', $breadssss)->Where('location_id', $citys->id)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->Where('website_type', 2)->paginate(16);
            else if(!empty($breads))
            $product = Product::Where('brand_id', $breadssss)->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->paginate(16);
            else if(!empty($citys))
            $product = Product::Where('location_id', $citys->id)->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->paginate(16);
            else   
            $product = Product::where(['published'=>1])->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->paginate(16);

        }else {

            if(!empty($citys)&&!empty($breads))
            $product = Product::Where('brand_id', $breadssss)->Where('location_id', $citys->id)->Where('website_type', 2)->whereNotIn('user_id', $send_too)->paginate(16);
            else if(!empty($breads))
            $product = Product::Where('brand_id', $breadssss)->Where('website_type', 2)->paginate(16);
            else if(!empty($citys))
            $product = Product::Where('location_id', $citys->id)->Where('website_type', 2)->paginate(16);
            else   
            $product = Product::where(['published'=>1])->Where('website_type', 2)->paginate(16);

        }

        $products=$product;
        return view('frontend.all-connections', compact('product','products'));
     
    }


    public function all_connections_breed(Request $request){
         $product = Product::where(['published'=>1])->Where('website_type', 2)->groupby('brand_id')->orderBy('brand_id','ASC')->get();
          return view('frontend.all-connections-breed', compact('product'));
     
    }


    public function connections(){
        $user_id=@Auth::user()->id;
        $connection = DB::table('connection')->where('send_by',$user_id)->where('status','1')->get();
        $connections = DB::table('connection')->where('send_to',$user_id)->where('status','1')->get();
        $pro=array();

        foreach ($connection as $key => $value) {
            $pro[]=$value->product_for;
            $con[]=$value->id;
        } 

        $pro1=array();
        foreach ($connections as $key => $value) {
            $pro1[]=$value->product_by;
            $con1[]=$value->id;
        } 

        $product = DB::table('products')->whereIn('id', $pro)->Where('website_type', 2)->get();
        $product1 = DB::table('products')->whereIn('id', $pro1)->Where('website_type', 2)->get();
        
        @$breed=$_GET['breed'];
         
        @$city=$_GET['city'];
        if(@$breed!=''){      
            $breads = DB::table('breed')->Where('name', 'like','%'.$breed.'%')->first();
            if(empty($breads)){ 
                $breadssss=9999999999;
            } else {
                $breadssss=$breads->id;
           }
         }
    
        if(@$city!=''){
            $citys = DB::table('city')->Where('name', 'like','%'.$city.'%')->first();
        }

        if(Auth::user()){  @$user_id=Auth::user()->id; } 

        @$connectionsd = DB::table('connection')->where('send_by',$user_id)->where('status','1')->get();

        foreach($connectionsd as $key =>$value){
            @$send_too[]=@$value->send_to;
        }
        if(!isset($send_too)){
            $send_too[]='';
        }
    
        if(@$user_id!=''){

            if(!empty($citys)&&!empty($breads))
            $products = Product::Where('brand_id', $breadssss)->Where('location_id', $citys->id)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->Where('website_type', 2)->orderby('id','Desc')->paginate(8);
            else if(!empty($breads))
            $products = Product::Where('brand_id', $breadssss)->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->orderby('id','Desc')->paginate(8);
            else if(!empty($citys))
            $products = Product::Where('location_id', $citys->id)->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->orderby('id','Desc')->paginate(8);
            else   
            $products = Product::where(['published'=>1])->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->orderby('id','Desc')->paginate(8);

         } else {
            if(!empty($citys)&&!empty($breads))
            $products = Product::Where('brand_id', $breadssss)->Where('location_id', $citys->id)->Where('website_type', 2)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->orderby('id','Desc')->paginate(8);
            else if(!empty($breads))
            $products = Product::Where('brand_id', $breadssss)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->Where('website_type', 2)->orderby('id','Desc')->paginate(8);
            else if(!empty($citys))
            $products = Product::Where('location_id', $citys->id)->Where('user_id', '!=' , $user_id)->whereNotIn('user_id' , $send_too)->Where('website_type', 2)->orderby('id','Desc')->paginate(8);
            else   
            $products = Product::where(['published'=>1])->Where('user_id', '!=' , $user_id)->whereNotIn('user_id', $send_too)->Where('website_type', 2)->orderby('id','Desc')->paginate(8);

        }
        return view('frontend.my_connection', compact('product','products','product1'));
       
    }




    public function connections_dog_wishlists(Request $request){

        $dog_has  =  DogWishlist::where('user_id', $request->user_id)->where('dog_id',  $request->dog_id)->first();

        if(empty($dog_has)){
            $dog = new DogWishlist;
            $dog->user_id = $request->user_id;
            $dog->dog_id = $request->dog_id;
            $dog->save();
            return 1;
        }else{
            DogWishlist::destroy($dog_has->id);
            return 0;
        }
    }


    public function all_request(){

		$categories = Category::where('website_type',2)->get();
		$attributes = DB::table('breed')->orderBy('name', 'asc')->get();

    	if(!Auth::check()){
            return redirect()->route('home');
        }
      
        $user_id=Auth::user()->id;
        $all_product_by_age[] ='';
        $all_product_by_breeds[] ='';
        $all_product_by_goodgenes[] ='';

        $users = Connection::where('send_to', $user_id); 

		if(isset($_GET['age']) && ($_GET['age'] != 'any')){
			$age = $_GET['age'];
			$all_products = DB::table('products')->select('id')->where('age', $age)->Where('website_type', 2)->get();
			foreach ($all_products as $key => $value) {
				array_push($all_product_by_age, $value->id);
			}
			$users = $users->whereIn('product_by', $all_product_by_age); 
		}

		if(isset($_GET['breeds']) && ($_GET['breeds'] != 'any')){
			$breeds = $_GET['breeds'];
			$all_products = DB::table('products')->select('id')->where('brand_id', $breeds)->Where('website_type', 2)->get();
			foreach ($all_products as $key => $value) {
				array_push($all_product_by_breeds, $value->id);
			}
			$users = $users->whereIn('product_by', $all_product_by_breeds); 
		}


		if(isset($_GET['goodgenes']) && ($_GET['goodgenes'] != 'any')){
			$goodgenes = $_GET['goodgenes'];
			$all_products = DB::table('products')->select('id')->where('category_id', $goodgenes)->Where('website_type', 2)->get();
			foreach ($all_products as $key => $value) {
				array_push($all_product_by_goodgenes, $value->id);
			}
			$users = $users->whereIn('product_by', $all_product_by_goodgenes); 
		}

		$users = $users->where('status','0')->orderBy('id', 'desc')->paginate(15);

        if($user_id!=''){      
          return view('frontend.all-request',compact('users', 'categories', 'attributes'));
        }else{     
          return redirect()->route('home');
        }
    }




    public function confirm_request($id){   
        $user_id=Auth::user()->id;
        DB::table('connection')->where('id',$id)->where('send_to',$user_id)->update(['status' => '1']);
        return redirect()->route('all_request')->with('success', 'Connection request confirmed.');
    }

    public function remove_request($id){   
        $user_id=Auth::user()->id;
        DB::table('connection')->where('id',$id)->delete();
        return redirect()->route('all_request')->with('success', 'Remove connection.');
    }


    public function unfriend($id){   
        $user_id=Auth::user()->id;
        DB::table('connection')->where('product_for',$id)->orwhere('product_by',$id)->where('send_to',$user_id)->orwhere('send_by',$user_id)->delete();
        return redirect()->route('connections')->with('success', 'Unfriend connection');
    }

    public function connections_block($id){
        $user_id = Auth::user()->id;

        $data = Connection::where('send_to' ,$user_id)->where('product_by' ,$id)->first();
         if(!empty($data)){
            if($data->is_block==0){
                $data->is_block = 1;
            }else{
                $data->is_block = 0;
            }
            $data->save();
         }
        return Redirect()->route('connections')->with('success', 'Block connection');
    }

    public function connections_report($id){
        $user_id = Auth::user()->id;
          $data = Connection::where('send_to' ,$user_id)->where('product_by' ,$id)->first();

         if(!empty($data)){
            if($data->is_report==0){
                $data->is_report = 1;
            }else{
                $data->is_report = 0;
            }
           
            $data->save();
         }
        return Redirect()->route('connections')->with('success', 'Report connection');
    }


    public function send_request($id){   
        $user_id=Auth::user()->id;
        $send_by=$id;
        
        $productuer = DB::table('products')->where('user_id',$user_id)->Where('website_type', 2)->first();
        if($productuer == ''){
            return redirect()->route('dog.account', 'id=new')->with('error', 'Need to add your dogs');
        }

        $product = DB::table('products')->where('id',$id)->Where('website_type', 2)->first();
        $userprod=$product->user_id;
        
        $productxx = DB::table('connection')->where('send_by',Auth::user()->id)->Where('send_to', $userprod)->count();
        
        if($productxx>0){
            
        } else {
            DB::table('connection')->insert(['send_by' => Auth::user()->id, 'send_to' => $userprod, 'product_for' => $id,'status' => '0','view' => 0,'product_by'=>$productuer->id]);
        }
        return Redirect()->route('connections')->with('success', 'Report Sent.');
    }


    public function send_requests($id){   
        $user_id=Auth::user()->id;
        $send_by=$id;
        
        $productuer = DB::table('products')->where('user_id',$user_id)->Where('website_type', 2)->first();
        $product = DB::table('products')->where('id',$id)->Where('website_type', 2)->first();
        $userprod=$product->user_id;
        
        $productxx = DB::table('connection')->where('send_by',Auth::user()->id)->Where('send_to', $userprod)->count();
        
        if($productxx>0){
            
        } else {
            DB::table('connection')->insert(['send_by' => Auth::user()->id, 'send_to' => $userprod, 'product_for' => $id,'status' => '0','view' => 0,'product_by'=>$productuer->id]);
        }
        
        if($_GET['breed']){
          return Redirect::to('https://dwiggydoo.com/all-connections?breed='.$_GET['breed']);   
        }else {
            return back();
        }
    }

    public function submitques(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        $ans_id=$request->ans;

        $product = DB::table('questionare_ans')->where('user_id',Auth::user()->id)->first();
     

        if(empty($product)){
            DB::table('questionare_ans')->insert(['user_id' => Auth::user()->id, 'ques_id' => $post_id, 'ans' => $ans_id,'status' => '1']);
        } else{
              return "Already Given"; 
         }
        return Redirect::to('https://dwiggydoo.com/dog_advice?ques=1');
    }


    public function submitcomm(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        $comment=$request->comment;

        $product = DB::table('dog_advice_comment')->where('user_id',Auth::user()->id)->first();
     

        if(1==1){
            DB::table('dog_advice_comment')->insert(['user_id' => Auth::user()->id, 'post_id' => $post_id, 'comment' => $comment,'status' => '1']);
        
        ?>
            <div class="container" id="yoyo">
	           <?php

                $cmnts = DB::table('dog_advice_comment')->orderby('id','Desc')->get();
                foreach($cmnts as $key => $value){
                    $user = DB::table('users')->where('id',$value->user_id)->first();  
                    $time2=time();
                    $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
                 
                ?>
                <div class="dd_thoght mt-4 d-flex justify-content-between align-items-center"  id="jojo"  >
        			<div class="about_say_img">
                        <img src="images/portrait-happy-young-adult-good-mood-sitting-table-home-crossed-legs-happy-housewife-fondling-french-bulldog-with-pleasure-copy-space-family-concept.png">
                    </div>
        			<div class="dd_thoght_text2 d-flex align-items-center ">
        				<div class="row ghj">
        					<div class="col">
        						<p style="color: black;"><b><?php echo $user->name;?></b></p>
        					</div>
        					<div class="col">
        						<p style="color: black; float: right;"><?php echo $hourdiff;?> hr ---</p>
        					</div>
        					<p class="forad"><?php echo $value->comment;?></p>
        					<hr style="height: 2px;     width: 95%;">
        				</div>
        			</div>
        		</div>
            </div>
    <?php  
            } 

        } else {
              return "Already Given"; 
        }
        // return redirect()->route('dog_advice');
    }


    public function submitlike(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        // $comment=$request->comment;

        $product = DB::table('dog_advice_like')->where('user_id',Auth::user()->id)->first();
     

        if(empty($product)){
            DB::table('dog_advice_like')->insert(['user_id' => Auth::user()->id, 'post_id' => $post_id,'status' => '1']);
        } else{
            return "Already Given"; 
        }
        return redirect()->route('dog_advice');
    }


    public function submitunlike(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        // $comment=$request->comment;

        $product = DB::table('dog_advice_like')->where('user_id',Auth::user()->id)->first();
        if(empty($product)){
       
         } else {
           DB::table('dog_advice_like')->where('post_id',$post_id)->where('user_id',$user_id)->delete();
         }
        return redirect()->route('dog_advice');
    }




    public function hsubmitques(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        $ans_id=$request->ans;

        $product = DB::table('hquestionare_ans')->where('user_id',Auth::user()->id)->first();
     

        if(empty($product)){
            DB::table('hquestionare_ans')->insert(['user_id' => Auth::user()->id, 'ques_id' => $post_id, 'ans' => $ans_id,'status' => '1']);
        } else{
              return "Already Given"; 
        }
        return redirect()->route('human_advice');
    }


    public function hsubmitcomm(Request $request){   
        $user_id=Auth::user()->id;
        $post_id=$request->id;
        $comment=$request->comment;

        $product = DB::table('human_advice_comment')->where('user_id',Auth::user()->id)->first();
     

        if(1==1){
            DB::table('human_advice_comment')->insert(['user_id' => Auth::user()->id, 'post_id' => $post_id, 'comment' => $comment,'status' => '1']);
        ?>
        <div class="container" id="yoyo">

	   <?php
            $cmnts = DB::table('human_advice_comment')->orderby('id','Desc')->get();
             foreach($cmnts as $key => $value){
             $user = DB::table('users')->where('id',$value->user_id)->first();  
              $time2=time();
             $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
        ?>

	   <div class="dd_thoght mt-4 d-flex justify-content-between align-items-center"  id="jojo"  >
			<div class="about_say_img">
                <img src="images/portrait-happy-young-adult-good-mood-sitting-table-home-crossed-legs-happy-housewife-fondling-french-bulldog-with-pleasure-copy-space-family-concept.png">
            </div>
			<div class="dd_thoght_text2 d-flex align-items-center ">
				<div class="row ghj">
					<div class="col">
						<p style="color: black;"><b><?php echo $user->name;?></b></p>
					</div>
					<div class="col">
						<p style="color: black; float: right;"><?php echo $hourdiff;?> hr ---</p>
					</div>
					<p class="forad"><?php echo $value->comment;?></p>
					<hr style="height: 2px;     width: 95%;">
				</div>
			</div>
		</div>
    </div>

    <?php  
            }
        } else {
              return "Already Given"; 
         }
        return redirect()->route('human_advice');
    }


    public function hsubmitlike($id){   
        $user_id=Auth::user()->id;
        $post_id=$id;
        // $comment=$request->comment;
        $product = DB::table('human_advice_like')->where('user_id',Auth::user()->id)->first();
     
        if(empty($product)){
            DB::table('human_advice_like')->insert(['user_id' => Auth::user()->id, 'post_id' => $post_id,'status' => '1']);
        } else {
            return "Already Given"; 
        }
        return redirect()->route('human_advice');
    }


    public function hsubmitunlike($id){   
        $user_id=Auth::user()->id;
        $post_id=$id;
        // $comment=$request->comment;

        $product = DB::table('human_advice_like')->where('user_id',Auth::user()->id)->first();
     
        if(empty($product)){
       
         } else{
           DB::table('human_advice_like')->where('post_id',$post_id)->where('user_id',$user_id)->delete();
         }
        return redirect()->route('human_advice');
    }


    public function hsubmitsugg(Request $request){   
        $user_id=Auth::user()->id;
        $name=$request->name;
        $current=$request->current;
        $mobile=$request->mobile;
        $email=$request->email;
        $comment=$request->comment;

        // $comment=$request->comment;

        $product = DB::table('blog_suggestion')->where('user_id',Auth::user()->id)->first();
     
        if(1==1){
           DB::table('blog_suggestion')->insert(
        ['user_id' => Auth::user()->id, 'name' => $name,'mobile' => $mobile,'email' => $email,'comment' => $comment,'status' => '1']
        );
        } else{
       
        }

        return 1;
        // return Redirect::to($current);
        
    }



    public function hsubmitconcern(Request $request){   
            $user_id=Auth::user()->id;
            $concern=$request->concern;
            // $comment=$request->comment;
            $product = DB::table('blog_concern')->where('user_id',Auth::user()->id)->first();
            if(1==1){
                 
            DB::table('blog_concern')->insert(['user_id' => Auth::user()->id, 'concern' => $concern,'status' => '1']);
        ?>
            <div class="cmt_ntcation_sec mt-5" style="style:block;"  id="yoyo" >
                <?php
                    $cmnts = DB::table('blog_concern')->orderby('id','Desc')->get();
                    foreach($cmnts as $key => $value){
                    $user = DB::table('users')->where('id',$value->user_id)->first();  
                    $time2=time();
                    $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
                ?>
            	 <div class="cmt_ntcation_sec mt-5"  id="jojo" >
            		<div class="cmt_ntcation d-flex py-4">
            			<div class="about_say_img mr-4"><img src="images/new_xd_images/user_img.png"></div>
            			<div class="cmt_ntcation_area pos-rel">
            				<div class="cmt_ntcation_body">
            					<strong class="f-16 color-00 mb-4 d-block"><?=$user->name?></strong>
            					<p class="f-16 color-27 f-medium"><?=$value->concern?></p>
            				</div>
            		
            				<div class="cmt_ntcation_corner d-flex align-items-center">
            					<p class="cmt_time mr-3 mb-0"><?=$hourdiff?> hr</p>
            					<span class="pointer"><i class="fa-solid fa-ellipsis"></i></span>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
        <?php 

            } 
        } else {
              return "Already Given"; 
        }
      
        // return redirect()->route('social');
    }

    public function rewardblog(Request $request){
        
        $reward_point=$request->reward;
        $bid=$request->bid;
        $uid=$request->uid;
        
        $blogsss = DB::table('rewards')->where('bid',$bid)->where('user_id',$uid)->count();
        if($blogsss>0){
            return true;
        }else{
            DB::table('rewards')->insert(['bid'=> $bid,'user_id'=> $uid,'reward_point'=> $reward_point,'reward_type'=>'Blog Reading','type'=>'cr']);
            $blogssss = DB::table('users')->where('id',$uid)->first();  
            $reward_points=$blogssss->reward_point;
            $reward_point_new=$reward_points+5;
            DB::table('users')->where('id', $uid)->update(array('reward_point'=>$reward_point_new));
        }
        return true;
    }
    
    /*    
    public function hsubmitquesdaily(Request $request){
        $val1 = $request->val1;//reward question
        $val2 = $request->val2;//value question
        $val3 = $request->val3;//answer question
        $val4 = $request->val4;//reward question
        $val5 = $request->val5;//user-id 
        $val6 = $request->val6;//real answer choose
        echo $val3;
        print_r($request->val1);
        die(); 

        if($val3==$val6){  $anss='1'; }
        else{ $anss='0'; }

        $blogsss = DB::table('reward_question_attempt')->where('question_id',$val1)->where('user_id',$val5)->count();

       if($blogsss>0){
      
       }else{
        
            DB::table('reward_question_attempt')
            ->insert(['user_id'=> $val5,'question_id'=> $val1, 'submit_date'=> date('Y-m-d'), 'pass_or_fail'=> $anss,'current_option'=> $val3,'choose_option'=> $val2]);
            
            if($anss=='1'){
                DB::table('rewards')->insert(['qid'=> $val1,'user_id'=> $val5,'reward_point'=> $val4,'reward_type'=> 'Questionare correct answer','type'=>'cr']);
            }
            
            $blogssss = DB::table('users')->where('id',$val5)->first();  
            $reward_points=$blogssss->reward_point;
            $reward_point_new=$reward_points+5;
            DB::table('users')->where('id', $val5)->update(array('reward_point'=>$reward_point_new,));
        }
        if($anss == 1){

        }
        return redirect()->route('home')->with('success', 'Correct Answer');
    }
    */


    public function submit_question_daily(Request $request){

         $rewards_check = RewardQuestionAttempt::where('user_id', Auth::user()->id)->where('submit_date', date('Y-m-d'))->count();
         if($rewards_check > 0){
            return redirect()->route('home')->with('error', 'Already attempt! Next day you will try.');
         }
        //dd($request);
        $today_rewards = 0;
        $today = date("Y-m-d"); 
        $rewards = RewardQuestion::where('published_date', $today)->get();
        if($request != '' ){
            foreach($rewards as $key => $rewards){
                
                $aws = RewardQuestion::where('id', $request->id[$key])->first();
                $is_correct = 0;
                if($request->options[$key] == $aws->answer){$is_correct = 1; $today_rewards = $today_rewards+5;}

                 $attempt = new RewardQuestionAttempt;
                 $attempt->question_id = $request->id[$key];
                 $attempt->user_id = Auth::user()->id;
                 $attempt->pass_or_fail = $is_correct;
                 $attempt->submit_date = date('Y-m-d');
                 $attempt->current_option = $aws->answer;
                 $attempt->choose_option = $request->options[$key];
                 $attempt->save();

                 if($is_correct==1){
                     $rewards = new Rewards;
                     $rewards->reward_point = 5;
                     $rewards->user_id = Auth::user()->id;
                     $rewards->status = 1; 
                     $rewards->reward_type = 'Questionare correct answer';
                     $rewards->bid = 0;
                     $rewards->type = 'cr';
                     $rewards->qid = $request->id[$key];
                     $rewards->save();

                 }
            }
        }

        if($today_rewards > 0){
            $user = User::findOrFail(Auth::user()->id);
             $user->reward_point = Auth::user()->reward_point+$today_rewards;
             $user->save();
            return redirect()->route('home')->with('success', 'Thank you for submission! You have earned '.$today_rewards.'.');
        }else{
            return redirect()->route('home')->with('error', 'Sorry! All are wrong answer.');
        }
        
    }
    

    public function ajax_search(Request $request){
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $request->search) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(3);

        $categories = Category::where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }


    public function listing(Request $request){
        return $this->search($request);
    }

    public function listingByCategory(Request $request, $category_slug){
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->search($request, $category->id);
        }
        abort(404);
    }

    public function listingByBrand(Request $request, $brand_slug){
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->search($request, null, $brand->id);
        }
        abort(404);
    }

    public function search(Request $request, $category_id = null, $brand_id = null){
        $query = $request->q;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;

            $products = $products->whereIn('category_id', $category_ids);
        }

        if($min_price != null && $max_price != null){
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%');
        }

        if($sort_by != null){
            switch ($sort_by) {
                case 'newest':
                    $products->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $products->orderBy('created_at', 'asc');
                    break;
                case 'price-asc':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case 'price-desc':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if($product->attributes != null && is_array(json_decode($product->attributes))){
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if($attribute['id'] == $value){
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if(!$flag){
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    }
                    else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                foreach ($choice_option->values as $key => $value) {
                                    if(!in_array($value, $attributes[$pos]['values'])){
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if($request->has('attribute_'.$attribute['id'])){
                foreach ($request['attribute_'.$attribute['id']] as $key => $value) {
                    $str = '"'.$value.'"';
                    $products = $products->where('choice_options', 'like', '%'.$str.'%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_'.$attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if(!in_array($color, $all_colors)){
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if($request->has('color')){
            $str = '"'.$request->color.'"';
            $products = $products->where('colors', 'like', '%'.$str.'%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(12)->appends(request()->query());

        return view('frontend.product_listing', compact('products', 'query', 'category_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
    }

    public function all_brands(Request $request){
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function social_campaign(){
        return view('frontend.social_campaign');           
    }
    public function socially_reliable(){
        return view('frontend.socially_reliable');           
    }
    public function your_solution(){
        return view('frontend.your_solution');           
    }
    public function redeem(){
        return view('frontend.redeem');           
    }

































public function sliderdynamicuserc(Request $request)
    {   
        $uid=$request->uid;
       $dd=''; 
    $socials = DB::table('socials')->where('end_time','>=',time())->where('user_id','=',@$uid)->get();
     $dd.='<div data-slide="slide" class="slide">
            <div class="slide-items" >';
                    foreach ($socials as $key => $value) {
            $dd.='<img class="imageslider" src="'.@$value->image.'"  alt="Img 1">';
                      }  
            
            $dd.=' </div><nav class="slide-nav">
                    <div class="slide-thumb"></div>
                    <button class="slide-prev">Previous</button>
                    <button class="slide-next">Next</button>
                </nav>

            </div>';         
                    return $dd;
    }


  public function sliderdynamicuser(Request $request)
    {   
        $uid=$request->uid;
       $dd=''; 
 @$socialss = DB::table('socials')->where('end_time','>=',time())->where('user_id',@$uid)->get();
           $dd.='<div data-slide="slide" class="slide">
            <div class="slide-items" >';
   foreach (@$socialss as $key => $value) {
            $dd.='<img class="imageslider" src="'.@$value->image.'" alt="Img 1">';
                      }  
            $dd.=' </div><nav class="slide-nav">
                    <div class="slide-thumb"></div>
                    <button class="slide-prev">Previous</button>
                    <button class="slide-next">Next</button>
                </nav>

            </div>';
                    
                    return $dd;
    }





     public function store(Request $request)
    {


     if($request->idd!=''){



        if($request->hasFile('myfile')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120'
            ]);
            $request->myfile->store('product', 'public');
            $file_path = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile->hashName();
         }else{
            $file_path = $request->photo;  
         }
        if($request->hasFile('myfile1')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120'
            ]);
            $request->myfile1->store('product', 'public');
            $file_path1 = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile1->hashName();
         }else{
            $file_path1 = $request->photo1;  
         }
        if($request->hasFile('myfile2')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120'
            ]);
            $request->myfile2->store('product', 'public');
            $file_path2 = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile2->hashName();
         }else{
            $file_path2 = $request->photo2;  
         }
        if($request->hasFile('myfile3')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120'
            ]);
            $request->myfile3->store('product', 'public');
            $file_path3 = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile3->hashName();
         }else{
            $file_path3 = $request->photo3;  
         }
        if($request->hasFile('myfile4')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120'
            ]);
            $request->myfile4->store('product', 'public');
            $file_path4 = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile4->hashName();
         }else{
            $file_path4 = $request->photo4;  
         }



    $idd= $request->idd;
    $arr = array(
    'name' => $request->name,
      'user_id' => Auth::user()->id,
      'category_id' => $request->category_id,
      'brand_id' => $request->brand_id,
      'photos' => $request->photos,
      'thumbnail_img' => $request->thumbnail_img,
      'unit' => $request->unit,
      'description' => $request->description,
        'age' => $request->age,
      'location_id' => $request->location_id,
      'file_path'=>$file_path,
      'file_path1'=>$file_path1,
      'file_path2'=>$file_path2,
      'file_path3'=>$file_path3,
      'file_path4'=>$file_path4,
         );
      

    DB::table('products')
            ->where('id', $idd)
            ->update($arr);



      flash(translate('Product has been updated successfully'))->success();  

     }      
     else
     {



        $product = new Product;
        $product->name = $request->name;
        $product->added_by = 'customer';
        if(Auth::user()->user_type == 'customer'){
            $product->user_id = Auth::user()->id;
        }
        else{
            $product->user_id = \App\User::where('user_type', 'admin')->first()->id;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
       
        $product->photos = $request->photos;
        $product->thumbnail_img = $request->thumbnail_img;
        $product->unit = $request->unit;
       
        $product->description = $request->description;
           $product->age = $request->age;
        
           $product->location_id = $request->location_id;

            $product->website_type = 2;


   
         if ($request->hasFile('new_myfile')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->new_myfile->store('product', 'public');

           

            $product->file_path = "https://dwiggydoo.com/storage/app/public/product/".$request->new_myfile->hashName();
         }
         else
         {
            $product->file_path = $request->photo;  
         }


   
         if ($request->hasFile('new_myfile1')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->new_myfile1->store('product', 'public');

           

            $product->file_path1 = "https://dwiggydoo.com/storage/app/public/product/".$request->new_myfile1->hashName();
         }
         else
         {
            $product->file_path1 = $request->photo;  
         }


   
         if ($request->hasFile('new_myfile2')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->new_myfile2->store('product', 'public');

           

            $product->file_path2 = "https://dwiggydoo.com/storage/app/public/product/".$request->new_myfile2->hashName();
         }
         else
         {
            $product->file_path2 = $request->photo;  
         }


   
         if ($request->hasFile('new_myfile3')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->new_myfile3->store('product', 'public');

           

            $product->file_path3 = "https://dwiggydoo.com/storage/app/public/product/".$request->new_myfile3->hashName();
         }
         else
         {
            $product->file_path3 = $request->photo;  
         }


   
         if ($request->hasFile('new_myfile4')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,mp4,mov,ogg|max:5120' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->new_myfile4->store('product', 'public');

           

            $product->file_path4 = "https://dwiggydoo.com/storage/app/public/product/".$request->new_myfile4->hashName();
         }
         else
         {
            $product->file_path4 = $request->photo;  
         }





        
        $product->save();

       

        flash(translate('Product has been inserted successfully'))->success();

    }

        // Artisan::call('view:clear');
        // Artisan::call('cache:clear');
      
            // return redirect()->route('index');
           

return Redirect::to('https://dwiggydoo.com/?thnx=1');
        
    }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->orWhere('phone', $request->email)->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);
                }
                else{
                    auth()->login($user, false);
                }
            }
            else {
                flash(translate('Invalid email or password!'))->warning();
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        //dd("test");
        return view('backend.dashboard');
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    { 
		return view('frontend.user.customer.dashboard');
    }
    public function account()
    { 
         $city = DB::table('city')->orderBy('name', 'asc')->groupBy('name')->get();
        return view('frontend.user.customer.user_account', compact('city'));
    }

    public function profile(Request $request)
    {

        if(Auth::user()->user_type == 'customer'){
            return view('frontend.user.customer.profile');
        }
        elseif(Auth::user()->user_type == 'seller'){
            return view('frontend.user.seller.profile');
        }
    }

    public function customer_update_profile(Request $request)
    {
        if(env('DEMO_MODE') == 'On'){
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->profession_id = $request->profession_id;
        $user->location_id = $request->location_id;
        $user->city = $request->city;
        $user->gender = $request->gender;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        $user->social_links = json_encode($request->social_links);
        
        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password); 
        }

                if ($request->hasFile('myfile')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->myfile->store('product', 'public');

           

        $user->avatar_original = "https://dwiggydoo.com/storage/app/public/product/".$request->myfile->hashName();
         }
         else
         {
           $user->avatar_original = $request->photo;  
         }
        if($user->save()){
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function customer_update_social(Request $request)
    {
       
if ($request->hasFile('myfile')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->myfile->store('customer', 'public');

           

        $avatar_original = "https://dwiggydoo.com/storage/app/public/customer/".$request->myfile->hashName();
         }


         $user_id = Auth::user()->id;


$created_at=time();
$end_at=time() + (24*60*60); 

 $user_name = DB::table('users')->where('id',$user_id)->first();
 
 

DB::table('socials')->insert(
    ['image' => $avatar_original,
     'user_id' => $user_id,
     'uploaded_time' => $created_at,
     'end_time' => $end_at,
     'uploaded_name'=>$user_name->name,
     'uploaded_pic'=>$user_name->avatar_original,

   ]
);



       
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
    
    }




    public function seller_update_profile(Request $request)
    {
        if(env('DEMO_MODE') == 'On'){
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }
        $user->avatar_original = $request->photo;

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if($user->save() && $seller->save()){
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */







    


    

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('published', 1, 'featured', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        if($flash_deal != null)
            return view('frontend.flash_deal_details', compact('flash_deal'));
        else {
            abort(404);
        }
    }

    public function load_featured_section(){
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section(){
        return view('frontend.partials.best_selling_section');
    }

    public function load_home_categories_section(){
        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section(){
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if($request->has('order_code')){
            $order = Order::where('code', $request->order_code)->first();
            if($order != null){
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct  = Product::where('slug', $slug)->first();
        $related  = Product::where('category_id', $detailedProduct->category_id)->limit(3)->get()->toArray();
        if($detailedProduct!=null && $detailedProduct->published){
            //updateCartSetup();
            if($request->has('product_referral_code')){
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if($detailedProduct->digital == 1){
                return view('frontend.digital_product_details', compact('detailedProduct'));
            }
            else {
                return view('frontend.product_details', compact('detailedProduct','related'));
            }
            // return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null){
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0){
                return view('frontend.seller_shop', compact('shop'));
            }
            else{
                return view('frontend.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        abort(404);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null && $type != null){
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }


    public function show_product_upload_form(Request $request)
    {
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_uploads > 0){
                $categories = Category::all();
                return view('frontend.user.seller.product_upload', compact('categories'));
            }
            else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::all();
        return view('frontend.user.seller.product_upload', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category::all();
        return view('frontend.user.seller.product_edit', compact('product', 'categories', 'tags', 'lang'));
    }




    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if(is_array($request->top_categories) && in_array($category->id, $request->top_categories)){
                $category->top = 1;
                $category->save();
            }
            else{
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if(is_array($request->top_brands) && in_array($brand->id, $request->top_brands)){
                $brand->top = 1;
                $brand->save();
            }
            else{
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(translate('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if(json_decode(Product::find($request->id)->choice_options) != null){
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }



        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }

        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price -= ($price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }
        }

        if($product->tax_type == 'percent'){
            $price += ($price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $price += $product->tax;
        }
        return array('price' => single_price($price*$request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
    }



    public function seller_digital_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.user.seller.digitalproducts.products', compact('products'));
    }
    public function show_digital_product_upload_form(Request $request)
    {
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_digital_uploads > 0){
                $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
                $categories = Category::where('digital', 1)->get();
                return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
            }
            else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }

        $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
        $categories = Category::where('digital', 1)->get();
        return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $lang = $request->lang;
        $product = Product::find($id);
        return view('frontend.user.seller.digitalproducts.product_edit', compact('categories', 'product', 'lang'));
    }

    // Ajax call
    public function new_verify(Request $request)
    {
        $email = $request->email;
        if(isUnique($email) == '0') {
            $response['status'] = 2;
            $response['message'] = 'Email already exists!';
            return json_encode($response);
        }

        $response = $this->send_email_change_verification_mail($request, $email);
        return json_encode($response);
    }


    // Form request
    public function update_email(Request $request)
    {
        $email = $request->email;
        if(isUnique($email)) {
            $this->send_email_change_verification_mail($request, $email);
            flash(translate('A verification mail has been sent to the mail you provided us with.'))->success();
            return back();
        }

        flash(translate('Email already exists!'))->warning();
        return back();
    }

    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_USERNAME');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback').'?new_email_verificiation_code='.$verification_code.'&email='.$email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");

        } catch (\Exception $e) {
            // return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function email_change_callback(Request $request){
        if($request->has('new_email_verificiation_code') && $request->has('email')) {
            $verification_code_of_url_param =  $request->input('new_email_verificiation_code');
            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();

            if($user != null) {

                $user->email = $request->input('email');
                $user->new_email_verificiation_code = null;
                $user->save();

                auth()->login($user, true);

                flash(translate('Email Changed successfully'))->success();
                return redirect()->route('dashboard');
            }
        }

        flash(translate('Email was not verified. Please resend your mail!'))->error();
        return redirect()->route('dashboard');

    }

    public function connect_both_happy(){
         $user = DB::table('users')->where('profession_id',Auth::user()->profession_id)->whereNotIn('id', [Auth::user()->id])->get();
        $user_arr[] ='';
        foreach ($user as $key => $value) {
            array_push($user_arr, $value->id);
        }
        $products = Product::where('location_id', Auth::user()->location_id)->whereIn('user_id', $user_arr)->where('website_type', 2)->paginate(16);
        return view('frontend.connect_both_happy', compact('products'));
    }

}
