<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomOrder extends Model

{

    public function ecom_orderDetails()

    {

        return $this->hasMany(EcomOrderDetail::class);

    }



    public function refund_requests()

    {

        return $this->hasMany(RefundRequest::class);

    }



    public function user()

    {

        return $this->belongsTo(User::class);

    }



    public function pickup_point()

    {

        return $this->belongsTo(PickupPoint::class);

    }

}

