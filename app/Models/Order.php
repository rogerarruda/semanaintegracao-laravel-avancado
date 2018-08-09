<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'quantity',
        'price_unity',
        'total',
        'status',
        'user_id',
        'order_id',
    ];

    public function setPriceUnityAttribute($value)
    {
        $this->attribute['price_unity'] = $value;
        $this->attribute['total'] = $this->attribute['quantity'] * $value;
    }

    public function getPriceUnityBRAttribute()
    {
        return 'R$ '.number_format($this->total, 2, ',', '.');
    }

    public function getTotalBRAttribute()
    {
        return 'R$ '.number_format($this->total, 2, ',', '.');
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
