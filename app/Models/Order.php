<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    /**
     * An order belongs to a user (the customer).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An order has many order items.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
