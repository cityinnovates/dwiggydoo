<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App;



class EcomCategory extends Model

{

    public function getTranslation($field = '', $lang = false){

        $lang = $lang == false ? App::getLocale() : $lang;

        $ecom_category_translation = $this->hasMany(EcomCategoryTranslation::class)->where('lang', $lang)->first();

        return $ecom_category_translation != null ? $ecom_category_translation->$field : $this->$field;

    }



    public function ecom_category_translations(){

    	return $this->hasMany(EcomCategoryTranslation::class);

    }



    public function ecom_products(){

    	return $this->hasMany(EcomProduct::class);

    }



    public function classified_products(){

    	return $this->hasMany(CustomerProduct::class);

    }





}

