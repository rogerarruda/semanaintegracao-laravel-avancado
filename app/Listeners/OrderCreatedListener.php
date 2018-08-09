<?php

namespace App\Listeners;

use App\Events\OrderCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\OrderCreatedNotification;

class OrderCreatedListener
{

    public function __construct()
    {
        //
    }

    public function handle(OrderCreatedEvent $event)
    {
        $order = $event->getOrder();
        $user = $order->user;
        \Log::debug('Evento executado');
		//$user->notify(new OrderCreatedNotification($order));
    }
}
