<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $constructedTitle;

    public function __construct(
        public string $title = "",
        public string $description = "",
        public string $keywords = "",
        public string $canonical = ""
    ) {
        $this->constructedTitle = $title ? $title . ' - ' . config('app.name') : config('app.name') . ' - Commandez le meilleur smashburger à casablanca';
    }

    public function render()
    {
        return view('layouts.app');
    }
}
