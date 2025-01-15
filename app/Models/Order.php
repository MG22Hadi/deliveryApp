<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'items',
        'total_amount',
        'status',
        'order_time',
        'order_date'
    ];

    // العلاقة مع المستخدم
    // في ملف Order.php
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    // في نموذج Order (App\Models\Order.php)
}
