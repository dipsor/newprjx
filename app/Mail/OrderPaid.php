<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Users\Models\User;
use App\Orders\Models\Order;

class OrderPaid extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $order;

    /**
     * OrderCreated constructor.
     * @param User $user
     * @param Order $order
     */
    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Objednávka '.$this->order->name.' byla zaplacena')
            ->markdown('mails.orders.paid')
            ->with('order', $this->order);
    }
}
