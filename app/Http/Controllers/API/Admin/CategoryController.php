<?php

namespace App\Http\Controllers\API\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['permission:categories_create'])->only('create');
//        $this->middleware(['permission:categories_read'])->only('read');
//        $this->middleware(['permission:categories_update'])->only('edit');
//        $this->middleware(['permission:categories_delete'])->only('destroy');
//    }

    public function index()
    {
        $categories=Category::defaultCategory()->get();
        return response()->json($categories);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $rules = [];

//        foreach (config('translatable.locales') as $locale) {
//
//            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];
//
//        }//end of for each

        //$request->validate($rules);
        $request->request->add(['slug' => Str::slug($request->name)]);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        dd($request);
        Category::create($request->all());
        toast( __('site.added_successfully'),'success');
        return redirect()->route('admin.categories.index');
    }


    public function show( $id)
    {
        $category=Category::find($id)->first();
        //dd($category->name);
        return response()->json($category);
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('category_translations', 'slug')->ignore($category->id, 'category_id')]];

        }//end of for each

        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        $category->update($request->all());
        toast( __('site.updated_successfully'),'success');
        return redirect()->route('admin.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');
    }

    public function getcategory($id){
        $states = Category::where("parent_id",$id)->get();
        return json_encode($states);
    }

    public function editactive($cat_id)
    {
        try{
            $cat = Category::find($cat_id);
            $status = $cat->active == 0 ? 1 : 0;
            $cat->update(['active' => $status]);
            return redirect()->route('admin.categories.index')->with(['success' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.categories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
