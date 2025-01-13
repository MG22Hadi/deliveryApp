<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'image' , 'quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

//    public function favoritedBy()
//    {
//        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')->withTimestamps();
//    }
// العلاقة مع المفضلة
    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }
}
