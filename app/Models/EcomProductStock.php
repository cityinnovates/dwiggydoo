<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomProductStock extends Model

{

    //

    public function ecom_product(){

    	return $this->belongsTo(EcomProduct::class);

    }

}

