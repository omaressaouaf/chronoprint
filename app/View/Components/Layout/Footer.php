<?php

namespace App\View\Components\Layout;

use App\Models\Category;
use Illuminate\View\Component;

class Footer extends Component
{
    public function render()
    {
        return view('components.layout.footer', [
            "popularCategories" => Category::inRandomOrder()->take(8)->get()
        ]);
    }
}
