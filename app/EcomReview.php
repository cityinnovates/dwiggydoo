<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomReview extends Model

{

  public function user(){

    return $this->belongsTo(User::class);

  }



  public function ecom_product(){

    return $this->belongsTo(EcomProduct::class);

  }

}

