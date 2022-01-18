<?php

namespace  App\View\Voyager\Widgets;

use App\Models\Order;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;

class OrderDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Order::count();
        $string = __("Orders");

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "{$count} {$string}",
            'text'   => __('general.voyager_dimmer_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __("View all :resources", ["resources" => $string]),
                'link' => route('voyager.orders.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        /** @var App\Models\User  */
        $authUser = auth()->user();
        return $authUser->can('browse', new Order);
    }
}
