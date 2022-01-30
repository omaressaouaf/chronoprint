<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $constructedTitle;
    public string $constructedDescription;

    public function __construct(
        public string|null $title = "",
        public string|null $description = "",
        public string|null $keywords = "",
        public string|null $canonical = ""
    ) {
        $this->constructedTitle = $title ? $title . ' - ' . config('app.name') : config('app.name') . ' - La meilleur imprimerie en ligne à Casablanca - Imprimerie Maroc ' . now()->year;
        $this->constructedDescription = $description ? $description :  config("app.name") . " est une imprimerie en ligne à Casablanca qui facilite le processus d'impression de vos fichiers d'exigences commerciales tels que cartes de visite, flyers, catalogues, emballages, stylos, calendriers " . now()->year . ". La livraison est disponible dans tout le Maroc";
    }

    public function render()
    {
        return view('layouts.app');
    }
}
