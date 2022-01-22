<?php

namespace App\Models;

use App\Events\OrderStatusChanged;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            "name" => __("Unknown")
        ]);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function booted(): void
    {
        static::deleting(function ($order) {
            foreach ($order->items as $orderItem) {
                $orderItem->delete();
            }
        });

        static::updated(function ($order) {
            if ($order->isDirty('status')) {
                if ($order->status === 'shipped' || $order->status === 'cancelled') {
                    OrderStatusChanged::dispatch($order);
                }
            }
        });
    }
}
