<?php

namespace App\Http\Controllers\API\Admin;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Validator;

class DashboardController extends Controller
{
    public function index(){
        $admins_count=User::whereRoleIs('admin')->count();
        $products_count=Product::count();
        $clients_count=Client::count();
        $tags_count=Tag::count();
        $categories_count=Category::defaultCategory()->count();
        $subcategories_count=Category::subCategory()->count();
        return view('admin.welcome',compact('admins_count','products_count','categories_count','subcategories_count','clients_count','tags_count'));
    }

    public function store_global_numbering(Request $request){

        $request->validate([
            'cash_in'=>'required',
            'cash_out'=>'required',
            'payment' => 'required',
            'purchase'=>'required',
            'journal'=>'required',
            'inventory'=>'required'
        ]);

        $request_data=$request->except([
            'cashin_previous_number','cashin_new_number','cashout_previous_number',
            'cashout_new_number','pur_previous_number','pur_new_number','pay_previous_number',
            'pay_new_number','journal_previous_number','journal_new_number','inventory_previous_number','inventory_new_number'
        ]);
        if($request_data['cash_in'] == 'previous'){
            $request_data['cashin_previous_number']=$request->cashin_previous_number;
        }else{
            $request_data['cashin_new_number']=$request->cashin_new_number;
        }
        if($request_data['cash_out'] == 'previous'){
            $request_data['cashout_previous_number']=$request->cashout_previous_number;
        }else{
            $request_data['cashout_new_number']=$request->cashout_new_number;
        }
        if($request_data['payment'] == 'previous'){
            $request_data['pay_previous_number']=$request->pay_previous_number;
        }else{
            $request_data['pay_new_number']=$request->pay_new_number;
        }
        if($request_data['purchase'] == 'previous'){
            $request_data['pur_previous_number']=$request->pur_previous_number;
        }else{
            $request_data['pur_new_number']=$request->pur_new_number;
        }
        if($request_data['journal'] == 'previous'){
            $request_data['journal_previous_number']=$request->journal_previous_number;
        }else{
            $request_data['journal_new_number']=$request->journal_new_number;
        }
        if($request_data['inventory'] == 'previous'){
            $request_data['inventory_previous_number']=$request->inventory_previous_number;
        }else{
            $request_data['inventory_new_number']=$request->inventory_new_number;
        }

        dd($request_data);
    }

    public function add_account(Request $request){
        $request_data=$request->except(['analytics_code1']);
        if ($request->analytics_code == 'true'){
            $request_data['analytics_code1']=$request->analytics_code1;
        }

        dd($request_data);
    }
}
