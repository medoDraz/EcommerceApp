<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Order extends Model
{
	protected $table ='product_order';
    protected $fillable = ['product_id','order_id'];
}
