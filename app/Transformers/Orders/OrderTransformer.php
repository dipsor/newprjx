<?php

namespace App\Transformers\Orders;

use League\Fractal\TransformerAbstract;
use App\Orders\Models\Order;

class OrderTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id'                => (int)$order->id,
            'user_id'           => (int)$order->user_id,
            'thesis_id'         => (int)$order->thesis_id,
            'orderName'         => (string)$order->orderName,
            'first_name'        => (string)$order->first_name,
            'last_name'         => (string)$order->last_name,
            'phone_number'      => (string)$order->phone_number,
            'city'              => (string)$order->city,
            'street'            => (string)$order->street,
            'postal_code'       => (string)$order->postal_code,
            'country_code'      => (string)$order->country_code,
            'price'             => (string)$order->price,
            'gopay_order_id'    => (int)$order->gopay_order_id,
            'created_at'        => (string)$order->created_at,
            'updated_at'        => (string)$order->updated_at,
        ];
    }
}
