<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_read'])->only('read');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');
    }

    public $t=[];
    public function index()
    {
        $admins=User::whereRoleIs('admin')->get();
        return view('admin.users.index',compact('admins'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|unique:users',
            'image'=>'image',
            'password'=>'required',
            'permissions'=>'required|min:1'
        ]);
        $request_data=$request->except(['image','password','permissions']);
        $request_data['password']=bcrypt( $request->password);

        if($request->has('image')) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user=User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        toast( __('site.added_successfully'),'success');
        return redirect()->route('admin.users.index');
    }


    public function show(User $user)
    {

    }


    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id )],
            'image'=>'image',
            'password'=>'required',
            'permissions'=>'required|min:1'
        ]);
        $request_data=$request->except(['image','password','permissions']);
        if($request->password){
            $request_data['password']=bcrypt( $request->password);
        }

        if($request->has('image')) {
            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);
        $user->syncPermissions($request->permissions);
        toast( __('site.updated_successfully'),'success');
        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {
//        dd($user);
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
        }
        $user->delete();
        toast( __('site.deleted_successfully'),'success');
        return redirect()->route('admin.users.index');
    }

    public function editactive($user_id)
    {
        try{
            $user = User::find($user_id);
            $status = $user->active == 0 ? 1 : 0;
            $user->update(['active' => $status]);
            toast( 'تم تحديث الحالة بنجاح','success');
            return redirect()->route('admin.users.index');
        } catch (\Exception $ex) {
            toast( 'حدث خطا ما برجاء المحاوله لاحقا','success');
            return redirect()->route('admin.users.index');
        }
    }
}
