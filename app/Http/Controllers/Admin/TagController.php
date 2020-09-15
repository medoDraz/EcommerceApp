<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tags_create'])->only('create');
        $this->middleware(['permission:tags_read'])->only('read');
        $this->middleware(['permission:tags_update'])->only('edit');
        $this->middleware(['permission:tags_delete'])->only('destroy');
    }

    public function index()
    {
        $tags=Tag::all();
        return view('admin.tags.index',compact('tags'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('tag_translations', 'name')]];

        }//end of for each

        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        Tag::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.tags.index');
    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('tag_translations', 'name')->ignore($tag->id, 'tag_id')]];

        }//end of for each

        $request->validate($rules);
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        $tag->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.tags.index');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.tags.index');
    }

    public function editactive($subcat_id)
    {
        try{
            $subcat = Tag::find($subcat_id);
            $status = $subcat->active == 0 ? 1 : 0;
            $subcat->update(['active' => $status]);
            return redirect()->route('admin.subcategories.index')->with(['success' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
