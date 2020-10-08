<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Favorite extends Model
{
    //
	protected $guarded = [];
	public function client()
    {
        return $this->belongsTo(Client::class);

    }//end of user

	public function product()
    {
        return $this->belongsTo(Product::class);

    }//end of products
}
