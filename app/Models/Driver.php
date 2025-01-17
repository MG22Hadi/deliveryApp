<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Schema;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Driver extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable=['name','phone','location','password','image'];


  public function getJWTIdentifier()
    {
        return $this->getKey(); // يعيد ID السائق
    }

    /**
     * إضافة بيانات إضافية إلى التوكن.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return []; // يمكنك إضافة بيانات إضافية هنا إذا لزم الأمر
    }
}
