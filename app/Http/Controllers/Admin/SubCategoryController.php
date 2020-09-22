<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:sub_categories_create'])->only('create');
        $this->middleware(['permission:sub_categories_read'])->only('read');
        $this->middleware(['permission:sub_categories_update'])->only('edit');
        $this->middleware(['permission:sub_categories_delete'])->only('destroy');
    }


    public function index(Request $request)
    {
        $subcategories=Category::subCategory()
            ->when($request->category_id, function ($q) use ($request) {
            return $q->where('parent_id', $request->category_id);
        })->get();
        $categories=Category::defaultCategory()->get();
//        dd($categories);
        return view('admin.subcategories.index',compact('subcategories','categories'));
    }


    public function create()
    {
        $categories=Category::defaultCategory()->get();
        return view('admin.subcategories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('category_translations', 'slug')]];
        }//end of for each

        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        Category::create($request->all());
        toast( __('site.added_successfully'),'success');
        return redirect()->route('admin.subcategories.index');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit($id)
    {

        $subcategory=Category::find($id);
//        dd($category);
        $categories=Category::defaultCategory()->get();
        return view('admin.subcategories.edit',compact('subcategory','categories'));
    }


    public function update(Request $request,  $id)
    {
        $subcategory=Category::find($id);
//        dd($subcategory);
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($subcategory->id, 'category_id')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('category_translations', 'slug')->ignore($subcategory->id, 'category_id')]];
        }//end of for each
//dd($rules);
        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
//        dd($request);
        $subcategory->update($request->all());
        toast( __('site.updated_successfully'),'success');
        return redirect()->route('admin.subcategories.index');
    }


    public function destroy($id)
    {
        $subcategory=Category::find($id);
        $subcategory->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.subcategories.index');
    }

    public function editactive($subcat_id)
    {
        try{
            $subcat = Category::find($subcat_id);
            $status = $subcat->active == 0 ? 1 : 0;
            $subcat->update(['active' => $status]);
            return redirect()->route('admin.subcategories.index')->with(['success' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
