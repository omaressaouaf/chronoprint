<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\OrderPlaced;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;

class SendToAdminsOrderPlacedNotification
{
    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $admins = User::whereRelation("role", "name", "admin")->get();

        Notification::send($admins, new OrderNotification(
            "Une nouvelle commande #{$event->order->id} a été passée. vous pouvez le gérer en cliquant sur le bouton ci-dessous",
            url("/admin/orders/{$event->order->id}"),
            notifyLocally: true
        ));
    }
}
