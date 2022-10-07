<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use App\Models\PlanPackagePayments;
use App\Models\PlanActivated;
use Session;
use Auth;

class PlansController extends Controller{

	public function index(){
	
		$data  =  DB::table('jp_can_pricing')->orderBy('pr_id', 'desc')->get();
		$edata  =  DB::table('jp_pricing')->orderBy('pr_id', 'desc')->get();
		$page_title = 'Manage Plans List' ;
	    return view('backend.plans.index', compact('data', 'edata', 'page_title'));

	}
	
	public function plan_lists(){
	    return view('frontend.plan-lists');
	}

	public function add_plans_ajax(Request $request){


	 	$data = array(
	 				'pr_name'  					=> $request->pr_name,
	 				'pr_type'  					=> $request->pr_type,
	 				'pr_limit'  				=> $request->pr_limit,
	 				'pr_nojob'  				=> $request->pr_nojob,
	 				'pr_notify'  				=> $request->pr_notify,
	 				'pr_orginal'  				=> $request->pr_orginal,
	 				'pr_offer'  				=> $request->pr_offer,
	 				'pr_job_aler'  				=> $request->pr_job_aler=='on' ? 1 : 0,
	 				'pr_view_employer_detail'  	=> $request->pr_view_employer_detail=='on' ? 1 : 0,
	 				'pr_prfle_viewrs'  			=> $request->pr_prfle_viewrs=='on' ? 1 : 0,
	 				'pr_boost'  				=> $request->pr_boost=='on' ? 1 : 0,
	 				'pr_as_jobsearch'  			=> $request->pr_as_jobsearch=='on' ? 1 : 0,
	 				'pr_resume_view'  			=> $request->pr_resume_view=='on' ? 1 : 0,
	 				'pr_enrichment'  			=> $request->pr_enrichment=='on' ? 1 : 0,
	 				'pr_video_interview'  		=> $request->pr_video_interview=='on' ? 1 : 0,
	 				'pr_gend_test'  			=> $request->pr_gend_test=='on' ? 1 : 0,
	 				'pr_psy_test'  				=> $request->pr_psy_test=='on' ? 1 : 0,
	 				'pr_status'  				=> $request->status,
            		'pr_encrypt_id'     		=> 'can'.md5($request->pr_name),
	 			);

        DB::table('jp_can_pricing')->insert($data);

        return back()->with('success','Thank you. Items updated successfully!');

      
  	}
	
	public function eadd_plans_ajax(Request $request){


	 	$data = array(
            'pr_name'        	=> $request->pr_name, 
            'pr_orginal'     	=> $request->pr_orginal, 
            'pr_offer'      	=> $request->pr_offer, 
            'peried'        	=> $request->peried, 
            'pr_limit'      	=> $request->pr_limit, 
            'pr_cvno'       	=> $request->pr_cvno, 
            'pr_notify'       	=> $request->pr_notify, 
            'pr_encrypt_id'     => 'emp'.md5($request->pr_name), 
        );
        DB::table('jp_pricing')->insert($data);

        return back()->with('success','Thank you. Items updated successfully!');

      
  	}
	public function destory($id){

		$data = DB::table('jp_can_pricing')->where('pr_id', $id);
    	$data->delete();
    	return back()->with('success', 'Deleted successful. Thank you.');

	}
	public function edestory($id){

		$data = DB::table('jp_pricing')->where('pr_id', $id);
    	$data->delete();
    	return back()->with('success', 'Deleted successful. Thank you.');

	}
	
	public function cstatus(Request $request){

		DB::table('jp_can_pricing')->where('pr_id', $request->id)->update(array('pr_status' => $request->status));
      	return response()->json(['success'=> 1]);

	}
	
	public function ecstatus(Request $request){

		DB::table('jp_pricing')->where('pr_id', $request->id)->update(array('pr_status' => $request->status));
      	return response()->json(['success'=> 1]);

	}
	
	public function edit($id){

		$data = DB::table('jp_can_pricing')->where('pr_id', $id)->first();
		$page_title = 'Edit Candidates Plan';
	    return view('backend.plans.edit', compact('data', 'page_title'));

	}
	
	public function eedit($id){

		$data = DB::table('jp_pricing')->where('pr_id', $id)->first();
		$page_title = 'Edit Employers Plan';
	    return view('backend.plans.eedit', compact('data', 'page_title'));

	}
	
	public function update(Request $request){

	 	$data = array(
 				'pr_name'  					=> $request->pr_name,
 				'pr_type'  					=> $request->pr_type,
 				'pr_limit'  				=> $request->pr_limit,
 				'pr_nojob'  				=> $request->pr_nojob,
 				'pr_notify'  				=> $request->pr_notify,
 				'pr_orginal'  				=> $request->pr_orginal,
 				'pr_offer'  				=> $request->pr_offer,
 				'pr_job_aler'  				=> $request->pr_job_aler=='on' ? 1 : 0,
 				'pr_view_employer_detail'  	=> $request->pr_view_employer_detail=='on' ? 1 : 0,
 				'pr_prfle_viewrs'  			=> $request->pr_prfle_viewrs=='on' ? 1 : 0,
 				'pr_boost'  				=> $request->pr_boost=='on' ? 1 : 0,
 				'pr_as_jobsearch'  			=> $request->pr_as_jobsearch=='on' ? 1 : 0,
 				'pr_resume_view'  			=> $request->pr_resume_view=='on' ? 1 : 0,
 				'pr_enrichment'  			=> $request->pr_enrichment=='on' ? 1 : 0,
 				'pr_video_interview'  		=> $request->pr_video_interview=='on' ? 1 : 0,
 				'pr_gend_test'  			=> $request->pr_gend_test=='on' ? 1 : 0,
 				'pr_psy_test'  				=> $request->pr_psy_test=='on' ? 1 : 0,
 				'pr_status'  				=> $request->status,
        		'pr_encrypt_id'     		=> 'can'.md5($request->pr_name),
 			);

	 	DB::table('jp_can_pricing')->where('pr_id', $request->pr_id)->update($data);

		return Redirect::to('https://dwiggydoo.com/admin/manage-plans');
    
	}
	
	public function eupdate(Request $request){

	 	$data = array(
            'pr_name'        	=> $request->pr_name, 
            'pr_orginal'     	=> $request->pr_orginal, 
            'pr_offer'      	=> $request->pr_offer, 
            'peried'        	=> $request->peried, 
            'pr_limit'      	=> $request->pr_limit, 
            'pr_cvno'       	=> $request->pr_cvno, 
            'pr_notify'       	=> $request->pr_notify, 
            'pr_status'       	=> $request->status, 
 			);

	 	DB::table('jp_pricing')->where('pr_id', $request->pr_id)->update($data);

        return back()->with('success','Thank you. Items updated successfully!');
	}
	public function plan_package(Request $request){

	
 		$data['plan_price'] = $request->plan_price;
 		$data['package_id'] = $request->package_id;
        $data['payment_method'] = 'razorpay';

        $request->session()->put('payment_type', 'plan_payment');
        $request->session()->put('payment_data', $data);
 		
 		$razorpay = new RazorpayController;
        return $razorpay->payWithRazorpay($request);
	}

 	public function purchase_payment_done($payment_data, $payment, $plan_package_id)
    {
    	$pack_details = DB::table('jp_pricing')->where('pr_id', Session::get('payment_data')['package_id'])->first();
    	
        $plan_activated = new PlanActivated;
        $plan_activated->user_id = Auth::user()->id;
        $plan_activated->payment_id = $plan_package_id;
        $plan_activated->plan_id = Session::get('payment_data')['package_id'];
        $plan_activated->start_date = strtotime("now");
        $plan_activated->totall_days = $pack_details->peried;
        $plan_activated->active = 1;
        $plan_activated->save();    		

        flash(translate('Package purchasing successful'))->success();
        return redirect()->route('profession.setup')->with('success','Package purchasing successful.');
    }
    public function user_plan(){
    	return view('frontend.user.customer.user_plan');
    }

}