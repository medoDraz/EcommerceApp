<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:products_create'])->only('create');
        $this->middleware(['permission:products_read'])->only('read');
        $this->middleware(['permission:products_update'])->only('edit');
        $this->middleware(['permission:products_delete'])->only('destroy');
    }

    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $categories=Category::defaultCategory()->get();
        $subcategories=Category::subCategory()->get();
        return view('admin.products.create',compact('categories','subcategories'));
    }


    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:product_translations,name'];
            $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'amount' => 'required',
        ];

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if
//dd($request_data);
        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.products.index');

    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
