<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_Tag;
use App\Tag;
use App\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

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
        $tags=Tag::all();
        $categories=Category::defaultCategory()->get();
        $subcategories=Category::subCategory()->get();
        return view('admin.products.create',compact('categories','subcategories','tags'));
    }


    public function store(Request $request)
    {
        
		
//        Product_Tag::create([
//            'tag_id'=>3,
//            'product_id'=>1
//        ]);

        $rules = [
            'category_id' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            //'filename.*' => 'mimes:jpg,jpeg,png'
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
		
        if ($request->tags){
            $tags_id=implode(',', $request->tags);
            $request_data['tag_ids'] = $tags_id;
        }
         //dd($request_data);
		 DB::beginTransaction();
        $product=Product::create($request_data);
		$images=array();
		if($files=$request->file('filename')){
			foreach($files as $file){
				$ex=$file->getClientOriginalExtension();
				$name=\Str::random(40).".".$ex;
				Image::make($file)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $name));
				$images[]=$name;
				$product_image= new Product_image();
				$product_image->product_id = $product->id;
				$product_image->image = $name;
				$product_image->save();
			}
			//$image=implode(',', $images);
            //$request_data['images'] = $image;
		}
		DB::commit();
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.products.index');

    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $tags=Tag::all();
        $categories=Category::defaultCategory()->get();
        $subcategories=Category::subCategory()->get();
		$images=Product_image::where('product_id',$product->id)->get();
        return view('admin.products.edit',compact('product','categories','subcategories','tags','images'));
    }


    public function update(Request $request, Product $product)
    {
//        dd($request);
        $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id, 'product_id')]];
            $rules += [$locale . '.description' => [ Rule::unique('product_translations', 'description')->ignore($product->id, 'product_id')]];
            $rules += [$locale . '.slug' => [ Rule::unique('product_translations', 'slug')->ignore($product->id, 'product_id')]];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'amount' => 'required',
        ];
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);

        $request->validate($rules);
        dd($request);
        $request_data = $request->all();

        if ($request->image) {
            if ($product->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/product_images/' . $product->image);
            }//end of if
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }//end of if
        if ($request->tags){
            $tags_id=implode(',', $request->tags);
            $request_data['tag_ids'] = $tags_id;
        }
                dd($request_data);
        $product->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.products.index');
    }


    public function destroy(Product $product)
    {
        if ($product->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/product_images/' . $product->image);
        }//end of if
        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.products.index');
    }

    public function editactive($product_id)
    {
        try{
            $product= Category::find($product_id);
            $status = $product->active == 0 ? 1 : 0;
            $product->update(['active' => $status]);
            return redirect()->route('admin.products.index')->with(['success' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.products.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
