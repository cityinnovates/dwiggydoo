<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Models\EcomOrder;
use App\Models\EcomOrderDetail;
use App\Models\EcomProduct;
use App\Models\EcomProductStock;
use App\Color;
use App\CouponUsage;
use App\OtpConfiguration;
use App\User;
use App\BusinessSetting;
use Auth;
use Session;
use DB;
use PDF;
use Mail;
use App\Mail\InvoiceEmailManager;
use App\Address;

class EcomOrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    // All Orders
    public function user_orders(Request $request)
    {
         //CoreComponentRepository::instantiateShopRepository();

         $date = $request->date;
         $sort_search = null;
         $orders = EcomOrder::orderBy('code', 'desc');
         if ($request->has('search')){
             $sort_search = $request->search;
             $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
         }
         if ($date != null) {
             $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
         }
         $orders = $orders->paginate(15);
         return view('backend.sales.user_orders.index', compact('orders', 'sort_search', 'date'));
    }

    public function user_orders_show($id)
    {
         $order = EcomOrder::findOrFail(decrypt($id));
         return view('backend.sales.user_orders.show', compact('order'));
    }


    public function user_update_delivery_status(Request $request)
    {
        $order = EcomOrder::findOrFail($request->order_id);
        $order->delivery_viewed = '0';
        $order->save();
  
        foreach($order->orderDetails as $key => $orderDetail){
            $orderDetail->delivery_status = $request->status;
            $orderDetail->save();
            
        }

        return 1;
    }






    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function order_confirmed(){
        $order = EcomOrder::findOrFail(Session::get('order_id'));
        return view('frontend.order_confirm', compact('order'));
    }

    public function user_order(Request $request){
        return $this->search($request);
    }


    public function user_invoice_download($id)

    {

        $order = EcomOrder::findOrFail($id);

        $pdf = PDF::setOptions([

                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,

                        'logOutputFile' => storage_path('logs/log.htm'),

                        'tempDir' => storage_path('logs/')

                    ])->loadView('backend.invoices.user_invoice', compact('order'));

        return $pdf->download('order-'.$order->code.'.pdf');

    }



    public function search(Request $request){
        $sort_by = $request->sort_by;
        
        $orders = EcomOrder::where('user_id', Auth::user()->id);

        if($sort_by != null){
            switch ($sort_by) {
                case 'newest':
                    $orders->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $orders->orderBy('created_at', 'asc');
                    break;
                default:
                    // code...
                    break;
            }
        }else{
             $orders->orderBy('created_at', 'desc');
        }
        $orders = $orders->get();
        return view('frontend.user.customer.user_order', compact('orders','sort_by'));
    }
    public function user_order_details($order_id){
        $order = EcomOrder::findOrFail($order_id);
        return view('frontend.user.customer.user_order_details', compact('order'));
    }

    public function order_shipping(Request $request){
        
        $order = new EcomOrder;
        
        $address = Address::where('id', $request->shipping_info)->first();

        if(Auth::check()){ $order->user_id = Auth::user()->id; }

        $full_address = array('name'=> Auth::user()->name, 'email'=> Auth::user()->email, 'address' => $address->address, 'city' => $address->city, 'country' => $address->country, 'postal_code' => $address->postal_code);

        $order->shipping_address = json_encode($full_address);
        $order->grand_total = $request->points;
        $order->delivery_viewed = '0';
        $order->code = date('Ymd-His').rand(10,99);
        $order->date = strtotime('now');

        if($order->save()){
                Session::put('order_id', $order->id);
                $product = EcomProduct::findOrFail($request->product_id);

                $order_detail = new EcomOrderDetail;
                $order_detail->order_id  = $order->id;
                $order_detail->product_id  = $request->product_id;
                $order_detail->variation  = 0;
                $order_detail->points  = $request->points;
                $order_detail->delivery_status  = 'pending';
                $order_detail->shipping_type  = 'home';
                $order_detail->quantity = $request->quantity;
                $order_detail->save();

                $product->num_of_sale++;
                $product->save();
        }

        return redirect()->route('products.order_confirmed');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new EcomOrder;
        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }
        else{
            $order->guest_id = mt_rand(100000, 999999);
        }

        $order->shipping_address = json_encode($request->session()->get('shipping_info'));

        $order->payment_type = $request->payment_option;
        $order->delivery_viewed = '0';
        $order->payment_status_viewed = '0';
        $order->code = date('Ymd-His').rand(10,99);
        $order->date = strtotime('now');

        if($order->save()){
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;

            //calculate shipping is to get shipping costs of different types
            $admin_products = array();
            $seller_products = array();

            //Order Details Storing
            foreach (Session::get('cart')->where('owner_id', Session::get('owner_id')) as $key => $cartItem){
                $product = Product::find($cartItem['id']);

                if($product->added_by == 'admin'){
                    array_push($admin_products, $cartItem['id']);
                }
                else{
                    $product_ids = array();
                    if(array_key_exists($product->user_id, $seller_products)){
                        $product_ids = $seller_products[$product->user_id];
                    }
                    array_push($product_ids, $cartItem['id']);
                    $seller_products[$product->user_id] = $product_ids;
                }

                $subtotal += $cartItem['price']*$cartItem['quantity'];
                $tax += $cartItem['tax']*$cartItem['quantity'];

                $product_variation = $cartItem['variant'];

                if($product_variation != null){
                    $product_stock = $product->stocks->where('variant', $product_variation)->first();
                    if($cartItem['quantity'] > $product_stock->qty){
                        flash(translate('The requested quantity is not available for ').$product->getTranslation('name'))->warning();
                        $order->delete();
                        return redirect()->route('cart');
                    }
                    else {
                        $product_stock->qty -= $cartItem['quantity'];
                        $product_stock->save();
                    }
                }
                else {
                    if ($cartItem['quantity'] > $product->current_stock) {
                        flash(translate('The requested quantity is not available for ').$product->getTranslation('name'))->warning();
                        $order->delete();
                        return redirect()->route('cart');
                    }
                    else {
                        $product->current_stock -= $cartItem['quantity'];
                        $product->save();
                    }
                }

                $order_detail = new EcomOrderDetail;
                $order_detail->order_id  =$order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->shipping_type = $cartItem['shipping_type'];
                $order_detail->product_referral_code = $cartItem['product_referral_code'];

                //Dividing Shipping Costs
                $order_detail->shipping_cost = getShippingCost($key);
                $shipping += $order_detail->shipping_cost;

                if ($cartItem['shipping_type'] == 'pickup_point') {
                    $order_detail->pickup_point_id = $cartItem['pickup_point'];
                }
                //End of storing shipping cost

                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

                $product->num_of_sale++;
                $product->save();
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if(Session::has('coupon_discount')){
                $order->grand_total -= Session::get('coupon_discount');
                $order->coupon_discount = Session::get('coupon_discount');

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Session::get('coupon_id');
                $coupon_usage->save();
            }

            $order->save();

            $array['view'] = 'emails.invoice';
            $array['subject'] = 'Your order has been placed - '.$order->code;
            $array['from'] = env('MAIL_USERNAME');
            $array['order'] = $order;

            foreach($seller_products as $key => $seller_product){
                try {
                    Mail::to(\App\User::find($key)->email)->queue(new InvoiceEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            //sends email to customer with the invoice pdf attached
            if(env('MAIL_USERNAME') != null){
                try {
                    Mail::to($request->session()->get('shipping_info')['email'])->queue(new InvoiceEmailManager($array));
                    Mail::to(User::where('user_type', 'admin')->first()->email)->queue(new InvoiceEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            $request->session()->put('order_id', $order->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_orders_destroy($id)
    {
        $order = EcomOrder::findOrFail($id);
        if($order != null){
            foreach($order->orderDetails as $key => $orderDetail){
                if ($orderDetail->variantion != null) {
                    $product_stock = EcomProductStock::where('product_id', $orderDetail->product_id)->where('variant', $orderDetail->variantion)->first();
                    if($product_stock != null){
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }
                }
                else {
                    $product = $orderDetail->ecom_product;
                    $product->current_stock += $orderDetail->quantity;
                    $product->save();
                }
                $orderDetail->delete();
            }
            $order->delete();
            flash(translate('Order has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return back();
    }

    public function order_details(Request $request)
    {
        $order = EcomOrder::findOrFail($request->order_id);
        $order->save();
        return view('frontend.user.seller.order_details_seller', compact('order'));
    }



}
