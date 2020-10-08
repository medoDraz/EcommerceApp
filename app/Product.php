<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['category_id','subcategory_id','image','sale_price','purchase_price','amount','active','tag_ids'];
    public $translatedAttributes = ['name','description','slug'];
    protected $guarded=[];
    protected $appends = ['image_path', 'profit_percent'];

    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);

    }//end of get profit attribute
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getImagePathAttribute(){
        return asset('uploads/product_images/'.$this->image);
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }
	
	public function images()
    {
    	return $this->hasMany(Product_image::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags()
	{
	    return $this->belongsToMany(Tag::class);
	}

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');

    }//end of orders
	
	public function product_favorite()
    {
        return $this->belongsTo(Product_Favorite::class);

    }//end of orders
}
