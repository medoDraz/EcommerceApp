<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email','image', 'password','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute($value){
        return ucfirst($value);
    }

    public function getLastNameAttribute($value){
        return ucfirst($value);
    }

    public function getImagePathAttribute(){
        return asset('uploads/user_images/'.$this->image);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);

    }//end of orders
	
	public function product_favorite()
    {
        return $this->hasMany(Product_Favorite::class);

    }//end of products
    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }
}
