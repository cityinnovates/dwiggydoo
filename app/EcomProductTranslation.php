<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomProductTranslation extends Model

{

    protected $fillable = ['product_id','name', 'lang'];



    public function ecom_product(){

      return $this->belongsTo(EcomProduct::class);

    }

}

