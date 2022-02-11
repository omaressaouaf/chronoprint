<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Hero extends Component
{
    public function render()
    {
        return view('components.home.hero', [
            "sliders" => [
                "1.png",
                "2.jpg",
                "3.jpg",
                "4.jpg",
            ]
        ]);
    }
}
