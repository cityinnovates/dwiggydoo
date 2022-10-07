<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomBrandTranslation extends Model

{

  protected $fillable = ['name', 'lang', 'brand_id'];



  public function ecom_brand(){

    return $this->belongsTo(EcomBrand::class);

  }

}

