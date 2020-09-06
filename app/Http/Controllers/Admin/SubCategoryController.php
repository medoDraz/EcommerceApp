<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SubCategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['permission:sub_categories_create'])->only('create');
//        $this->middleware(['permission:sub_categories_read'])->only('read');
//        $this->middleware(['permission:sub_categories_update'])->only('edit');
//        $this->middleware(['permission:sub_categories_delete'])->only('destroy');
//    }


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
        $request->request->add(['parent_id' => $request->category_id]);
        Category::create($request->all());
        session()->flash('success', __('site.added_successfully'));
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
            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];
            $rules += [$locale . '.slug' => ['required', Rule::unique('category_translations', 'slug')]];
        }//end of for each
//dd($rules);
        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        $request->request->add(['parent_id' => $request->category_id]);
        dd($request);
        $subcategory->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.subcategories.index');
    }


    public function destroy(Category $category)
    {
        //
    }
}
