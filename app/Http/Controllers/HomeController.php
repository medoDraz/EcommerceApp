<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_Order;
use App\Order;
use App\Product_Favorite;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

///////////////////////Home Function//////////////////////////////////////
    public function index(Request $request)
    {
        $categories = Category::defaultCategory()->where('active', 1)->get();
        $products = Product::when($request->name, function($q) use($request){
            return $q->whereTranslationLike('name' , '%'.$request->name.'%' );
        })->where('active', 1)->with('product_favorite')->latest()->paginate(15);
        $subcategories = Category::subCategory()->get();
		$user=\Auth::user();
		if($user == null){
			$product_favorites=null;
			return view('welcome', compact('categories', 'subcategories','product_favorites', 'products'));
		}
		$product_favorites=$user->product_favorite()->get();
		//dd($product_favorites);
        return view('welcome', compact('categories', 'subcategories','product_favorites', 'products'));
    }
////////////////////////Get Product of Category////////////////////////////
    public function categories($cat_id)
    {
        $categories = Category::defaultCategory()->where('active', 1)->get();
        $category = Category::defaultCategory()->where('id', $cat_id)->where('active', 1)->first();
        $products = Product::where('category_id', $cat_id)->where('active', 1)->paginate(15);
        $subcategories = Category::subCategory()->get();
        return view('categories', compact('categories', 'subcategories', 'products', 'category'));
    }
////////////////////////////Product Details///////////////////////////////////	
	public function product_details($product_id)
    {
        $categories = Category::defaultCategory()->where('active', 1)->get();
        $product = Product::where('id', $product_id)->where('active', 1)->first();
        $subcategories = Category::subCategory()->get();
        return view('product_details', compact('categories', 'subcategories', 'product'));
    }

    public function categoriesajax($cat_id)
    {
        $products = Product::with('category')->where('category_id', $cat_id)->where('active', 1)->paginate(15);
        return Response::json($products);
    }
////////////////////////////Add Product to Card///////////////////////////////	
	public function addproductcard(Request $request)
    {
		
		if($request->client_id == null){
			return response()->json([
				'success'=>false,
				'message' => 'please sign in to can add this product to your card'
			]);
		}else{
			$user=\Auth::user();
			DB::beginTransaction();
			$order = $user->orders()->create($request->all());
			Product_Order::create([
				'product_id'=> $request->product_id,
				'order_id'=> $order->id
			]);
			//dd($order);
			DB::commit();
			return response()->json([
				'success'=>true,
				'message' => 'added successful'
			]);
		}
		
    }
//////////////////////////////Get All Products in Cart///////////////////////////////
	public function cart(){
		$categories = Category::defaultCategory()->where('active', 1)->get();
        
        $subcategories = Category::subCategory()->get();
		$user=\Auth::user();
		if($user == null){
			$orders=null;
			return view('cart', compact('categories', 'subcategories','orders'));
		}
		$orders=$user->orders()->with('products')->get();
		//dd($orders);
		return view('cart', compact('categories', 'subcategories','orders'));
	}
//////////////////////////////Get All Products in Favorite///////////////////////////////
	public function favorite(){
		$categories = Category::defaultCategory()->where('active', 1)->get();
        
        $subcategories = Category::subCategory()->get();
		$user=\Auth::user();
		if($user == null){
			$products=null;
			return view('favorite', compact('categories', 'subcategories','products'));
		}
		$products=$user->product_favorite()->with('product')->get();
		//$products=Product_Favorite::with('products','client')->get();
		//dd($products);
		return view('favorite', compact('categories', 'subcategories','products'));
	}
//////////////////////////////Add Product in Favorite//////////////////////////////////////////////////////////////
	public function addfavorite(Request $request){
		if($request->client_id == null){
			return response()->json([
				'success'=>false,
				'message' => 'please sign in to can add this product to your Favorite'
			]);
		}else{
			$user=\Auth::user();
			$pro_fav=Product_Favorite::where('product_id',$request->product_id)->first();
			if($pro_fav){
				//dd('dsgrtgrg');
				$pro_fav->delete();
				return response()->json([
					'success'=>true,
					'save'=>0,
					'message' => 'product removed successful'
				]);
			}
			$order = $user->product_favorite()->create($request->all());
			//dd($order);
			return response()->json([
				'success'=>true,
				'save'=>1,
				'message' => 'product added successful'
			]);
		}
	}
}
