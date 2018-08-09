<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    public function getPriceBRAttribute()
    {
        return 'R$ '.number_format($this->price, 2, ',', '.');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
