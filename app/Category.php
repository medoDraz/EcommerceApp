<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Category extends Model
{
    use Translatable;
    protected $fillable = ['parent_id','active'];
    public $translatedAttributes = ['name','slug'];
    protected $guarded=[];

//    public function posts(){
//        return $this->hasMany(Post::class);
//    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function scopeDefaultCategory($query){
        return $query -> where('parent_id',0);
    }

    public function scopeSubCategory($query){
        return $query -> where('parent_id', '!=',0);
    }


}