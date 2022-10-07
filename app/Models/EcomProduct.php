<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App;

use App\User;

class EcomProduct extends Model

{

    protected $fillable = [

        'name','added_by', 'user_id', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'video_provider', 'video_link', 'unit_price',

        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'current_stock'

      ];



    public function getTranslation($field = '', $lang = false){

      $lang = $lang == false ? App::getLocale() : $lang;

      $ecom_product_translations = $this->hasMany(EcomProductTranslation::class)->where('lang', $lang)->first();

      return $ecom_product_translations != null ? $ecom_product_translations->$field : $this->$field;

    }



    public function ecom_product_translations(){

    	return $this->hasMany(EcomProductTranslation::class);

    }



    public function ecom_category(){

    	return $this->belongsTo(EcomCategory::class);

    }



    public function ecom_brand(){

    	return $this->belongsTo(EcomBrand::class);

    }



    public function user(){

    	return $this->belongsTo(User::class);

    }



    public function ecom_orderDetails(){

    return $this->hasMany(EcomOrderDetail::class);

    }



    public function ecom_reviews(){

    return $this->hasMany(EcomReview::class)->where('status', 1);

    }



    public function wishlists(){

    return $this->hasMany(Wishlist::class);

    }



    public function ecom_stocks(){

    return $this->hasMany(EcomProductStock::class);

    }

}

