<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Dropdown extends Component
{
    protected $listeners = ['cartChanged' => '$refresh'];

    public function render()
    {
        return view('livewire.cart.dropdown', [
            "cart" => Cart::where("user_id", auth()->id())->with(["items", "items.product"])->first()
        ]);
    }
}
