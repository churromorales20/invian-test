<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
//MODELS FOR Invian
use App\Models\Customers;
use App\Models\Categories;
use App\Models\CustomerCategories;
use App\Models\Companies;
class ApiController extends BaseController
{
  function users(){
    $users = Customers::select('name','phone','address','id')->where('company_id',auth()->user()->id)->get();
    $users->load('categories');
    return $users->toJson();
  }
  function companiesList(){
    $companies = Companies::get();
    $companies->load('user_owner');
    return $companies->toJson();
  }
  function alldata(){
    $companies = Companies::get();
    $companies->load('user_owner');
    $companies->load(['customers' => function ($query) {
        $query->with('categories');
    }]);
    return $companies->toJson();
  }
  function categories(){
    $categories = Categories::where('company_id',auth()->user()->id)->get();
    return $categories->toJson();
  }
  function categoriesuser($user){
    $customer = Customers::where('company_id',auth()->user()->id)->where('id',$user)->first();
    if(!$customer){
      abort(404);
    }
    $customer->load('categories');
    return $customer->categories->toJson();
  }
}
