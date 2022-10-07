<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App;



class EcomBrand extends Model

{

  public function getTranslation($field = '', $lang = false){

      $lang = $lang == false ? App::getLocale() : $lang;

      $ecom_brand_translation = $this->hasMany(EcomBrandTranslation::class)->where('lang', $lang)->first();

      return $ecom_brand_translation != null ? $ecom_brand_translation->$field : $this->$field;

  }



  public function ecom_brand_translations(){

    return $this->hasMany(EcomBrandTranslation::class);

  }



}

