<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $admins_count=User::whereRoleIs('admin')->count();
        $products_count=Product::count();
        $clients_count=Client::count();
        $tags_count=Tag::count();
        $categories_count=Category::defaultCategory()->count();
        $subcategories_count=Category::subCategory()->count();
        return view('admin.welcome',compact('admins_count','products_count','categories_count','subcategories_count','clients_count','tags_count'));
    }
}
