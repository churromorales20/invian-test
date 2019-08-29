<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Companies extends Model
{

  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable=['name','owner'];
  public function user_owner(){
    return $this->hasOne('App\User', 'id', 'owner');
  }
  public function customers(){
    return $this->hasMany('App\Models\Customers', 'company_id', 'id');
  }
}
