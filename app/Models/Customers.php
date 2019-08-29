<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable=['name','address','phone','company_id'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public function categories(){
        return $this->hasManyThrough('App\Models\Categories', 'App\Models\CustomerCategories','customer_id','id');
    }
}
