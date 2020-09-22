<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
        $categories = Category::defaultCategory()->where('active', 1)->get();
        $products = Product::where('active', 1)->get();
        $subcategories = Category::subCategory()->get();
        return view('welcome', compact('categories', 'subcategories', 'products'));
    }

    public function categories($cat_id)
    {
        $categories = Category::defaultCategory()->where('active', 1)->get();
        $category = Category::defaultCategory()->where('id', $cat_id)->where('active', 1)->first();
        $products = Product::where('category_id', $cat_id)->where('active', 1)->paginate(15);
        $subcategories = Category::subCategory()->get();
        return view('categories', compact('categories', 'subcategories', 'products', 'category'));
    }

    public function categoriesajax($cat_id)
    {
        $products = Product::with('category')->where('category_id', $cat_id)->where('active', 1)->paginate(15);
        return Response::json($products);
    }
}
