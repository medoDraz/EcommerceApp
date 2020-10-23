<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:clients_read'])->only('read');
        $this->middleware(['permission:clients_delete'])->only('destroy');
    }

    public function index()
    {
        $clients=Client::all();
        return view('admin.clients.index',compact('clients'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        //
    }


    public function update(Request $request, Client $client)
    {
        //
    }


    public function destroy(Client $client)
    {
        if ($client->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/user_images/' . $client->image);
        }
        $client->delete();
        toast( __('site.deleted_successfully'),'success');
        return redirect()->route('admin.clients.index');
    }

    public function editactive($user_id)
    {
        try{
            $user = Client::find($user_id);
            $status = $user->active == 0 ? 1 : 0;
            $user->update(['active' => $status]);
            toast( 'تم تحديث الحالة بنجاح','success');
            return redirect()->route('admin.clients.index');
        } catch (\Exception $ex) {
            toast( 'حدث خطا ما برجاء المحاوله لاحقا','success');
            return redirect()->route('admin.clients.index');
        }
    }
}
