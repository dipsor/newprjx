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
            'price'             => (string)$order->price,
            'gopay_order_id'    => (int)$order->gopay_order_id,
            'created_at'        => (int)$order->created_at,
            'updated_at'        => (int)$order->updated_at,
        ];
    }
}
