<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    }
}
