<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'wishlist_name','image'];
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value)
    {        
        return 'storage/app/public/'.$this->image;
        
    }

    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
