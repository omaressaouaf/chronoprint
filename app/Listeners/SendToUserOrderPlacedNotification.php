<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Notifications\OrderNotification;

class SendToUserOrderPlacedNotification
{
    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        /**
         * @var App\Models\User
         */
        $authUser = auth()->user();

        $authUser->notify(
            new OrderNotification(
                "Une nouvelle commande #{$event->order->id} a été passée par vous. nous y travaillons en ce moment",
                route("account.orders.show", ["id" => $event->order->id])
            )
        );
    }
}
