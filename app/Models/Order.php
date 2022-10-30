<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $appends = ['total'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function getTotalAttribute()
    {
        return OrderItem::where('order_id',$this->id)->sum('total');
    }
}
