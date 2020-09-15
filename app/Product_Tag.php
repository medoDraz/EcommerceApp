<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
    protected $fillable = ['tag_id','product_id'];
}
