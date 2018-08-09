<?php

namespace App\Observers;

use App\Models\Order;

use App\Notifications\OrderCreatedNotification;
use App\Jobs\DecrementStockJob;
use App\Jobs\IncrementStockJob;

class OrderObserver
{

    public function created(Order $order)
    {
        \Log::debug('Observer executado');
        DecrementStockJob::dispatch($order);
        $order->user->notify(new OrderCreatedNotification($order));
    }

    public function updated(Order $order)
    {
        if ($order->status == 'canceled') {
            IncrementStockJob::dispatch($order);
        }
    }

    public function deleted(Order $order)
    {
        //
    }

    public function restored(Order $order)
    {
        //
    }

    public function forceDeleted(Order $order)
    {
        //
    }
}
