<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $guarded=[];
	public function client()
    {
        return $this->belongsTo(Client::class);

    }//end of user

	public function products()
    {
        return $this->hasMany(Product::class,'id');

    }//end of products
}
