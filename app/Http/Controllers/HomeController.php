<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
        $categories=Category::defaultCategory()->get();
        $subcategories=Category::subCategory()->get();
        return view('welcome',compact('categories','subcategories'));
    }
}
