<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Notifications\OrderNotification;

class SendToUserOrderStatusChangedNotification
{
    /**
     * Handle the event.
     *
     * @param  OrderStatusChanged  $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        /**
         * @var App\Models\User
         */
        $authUser = auth()->user();

        $authUser->notify(
            new OrderNotification(
                $event->order->status === 'shipped'
                    ? "Votre commande #{$event->order->id} a été expédié à
                {$event->order->address_city}, {$event->order->address_line}, {$event->order->address_zip}"
                    : "Votre commande #{$event->order->id} a été annulée pour un problème technique ou commercial",
                route("account.orders.show", ["id" => $event->order->id])
            )
        );
    }
}
