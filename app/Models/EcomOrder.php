<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App\Models\EcomOrderDetail;
use App\User;

class EcomOrder extends Model

{

    public function orderDetails()

    {

        return $this->hasMany(EcomOrderDetail::class, 'order_id');

    }



    public function user()

    {

        return $this->belongsTo(User::class, 'user_id');

    }




}

