<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $constructedTitle;
    public string $constructedDescription;
    public string $constructedSchemaImageUrl;
    public string $constructedSchemaImageId;

    public function __construct(
        public string|null $title = "",
        public string|null $description = null,
        public string|null $keywords = "",
        public string|null $canonical = "",
        public string|null $schemaGraphs = "",
        public string|null $schemaImageUrl = null,
        public string|null $schemaBreadcrumbItems = ""
    ) {
        $this->constructedTitle = $title ? $title . ' - ' . config('app.name') : config('app.name') . ' - La meilleur imprimerie en ligne à Casablanca - Imprimerie Maroc ' . now()->year;
        $this->constructedDescription = $description ?? config("app.name") . " est une imprimerie en ligne à Casablanca qui facilite le processus d'impression de vos fichiers d'exigences commerciales tels que cartes de visite, flyers, catalogues, emballages, stylos, calendriers " . now()->year . ". La livraison est disponible dans tout le Maroc";
        $this->constructedSchemaImageUrl = $schemaImageUrl ?? asset("theme-images/logo.png");
        $this->constructedSchemaImageId = $schemaImageUrl ? "primary-image-1" : "logo";
    }

    public function render()
    {
        return view('layouts.app');
    }
}
