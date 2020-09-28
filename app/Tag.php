<?php

namespace App;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;
    protected $fillable = ['active'];
    public $translatedAttributes = ['name'];
    protected $guarded=[];

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

    public function products()
	{
	    return $this->belongsToMany(Product::class);
	}
}
