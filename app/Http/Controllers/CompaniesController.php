<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
//MODELS FOR Invian
use App\Models\Customers;
use App\Models\Categories;
use App\Models\CustomerCategories;
class CompaniesController extends BaseController
{
    function dashboard(){
      $categories = Categories::where('company_id',auth()->user()->id)->get();
      $users = Customers::where('company_id',auth()->user()->id)->get();
      $users->load('categories');
      return view('dashboard')->withCategories($categories)->withCustomers($users);
    }
    public function addCustomer(Request $request){
      $data = $request->all();
      $customer = Customers::create([
        'name' => $data['customer_name'],
        'address' => $data['customer_address'],
        'phone' => $data['customer_phone'],
        'company_id' => auth()->user()->id
      ]);
      foreach ($data['customer_categories'] as $categoryid) {
        CustomerCategories::create([
          'category_id' => $categoryid,
          'customer_id' => $customer->id
        ]);
      }
      return redirect()->route('home_dash');
    }
    public function addCategory(Request $request){
      $data = $request->all();
      Categories::create([
        'name' => $data['category_name'],
        'company_id' => auth()->user()->id
      ]);
      return redirect()->route('home_dash');
    }
}
