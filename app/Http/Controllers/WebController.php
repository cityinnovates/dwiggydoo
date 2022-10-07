<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class WebController extends Controller
{
    //Home page
    public function index()
    {
		$response = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/categories');
		$data=json_decode($response,true);
		$result['dataa']=$data['data'];
		//echo "<pre>";
		//print_r($result['data']);
        return view('frontend.index');    	
    }
    public function products($id)
    {
   
		$response = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/products/'.$id.'');
		$data=json_decode($response,true);
		$result['data']=$data['data'][0];
		
		$rel = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/products/related/'.$id.'');
		$rel_data=json_decode($rel,true);
		$result['related']=$rel_data['data'];

		return view('frontend.product_details',$result);
    	//return view('frontend.product_details',compact('arr'));
    }
	public function categoryProductList($id)
    {

		$response = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/products/category/'.$id.'');
		$data=json_decode($response,true);
		$result['data']=$data['data'];
		return view('frontend.product_listing',$result);
    }
	public function productDetails($id)
    {

		$response = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/products/'.$id.'');
		$data=json_decode($response,true);
		$result['data']=$data['data'][0];

		$rel = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/products/related/'.$data['data'][0]['id'].'');
		$rel_data=json_decode($rel,true);
		$result['related']=$rel_data['data'];

		
		$relz = file_get_contents('http://cilearningschool.com/dwiggydoo/api/v1/reviews/product/'.$id.'');
		$rel_dat=json_decode($relz,true);
		
		$result['reviews']=$rel_dat['data'];

		return view('frontend.product_details',$result);  	
    }
    
}
