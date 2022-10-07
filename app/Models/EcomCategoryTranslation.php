<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class EcomCategoryTranslation extends Model

{

    protected $fillable = ['name', 'lang', 'category_id'];



    public function ecom_category(){

    	return $this->belongsTo(EcomCategory::class);

    }

}

