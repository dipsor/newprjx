<?php

namespace App\Orders\Models;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'thesis_id',
        'orderName',
        'first_name',
        'last_name',
        'phone_number',
        'city',
        'street',
        'postal_code',
        'country_code',
        'price',
        'gopay_order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
