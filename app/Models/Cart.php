<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
//    use HasFactory;
//    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];
//
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    //TODO
//    // نقاش العلاقة
//    public function product()
//    {
//        //return $this->hasMany(Product::class);
//        return $this->belongsToMany(Product::class);
//
//    }

    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity','price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
