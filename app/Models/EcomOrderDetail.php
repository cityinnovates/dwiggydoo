<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomOrderDetail extends Model

{

    public function ecom_order()

    {

        return $this->belongsTo(EcomOrder::class, 'order_id');

    }



    public function ecom_product()

    {

        return $this->belongsTo(EcomProduct::class, 'product_id');

    }



    public function pickup_point()

    {

        return $this->belongsTo(PickupPoint::class);

    }



    public function refund_request()

    {

        return $this->hasOne(RefundRequest::class);

    }

}

