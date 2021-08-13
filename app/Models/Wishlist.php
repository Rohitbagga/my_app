<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  protected $fillable = ['user_id','wishlist_name'];
    use HasFactory;
  public function wishlistdata(){
   
     return $this->hasMany();
  }
    
}
