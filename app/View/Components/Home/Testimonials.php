<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Testimonials extends Component
{
    public function render()
    {
        return view('components.home.testimonials', [
            "testimonials" => [
                [
                    "rating" => 3,
                    "title" => "Bon rapport qualité/prix",
                    "body" => "Bon rapport qualité/prix. Vérification des visuels avant impression ce qui permet de réajuster les documents et ne pas avoir de surprise.
                    Coût supplémentaire raisonnable pour obtenir la livraison en 2jours.",
                    "author" => "Mohammed Belouche",
                    "date" => now()->subDays(60)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 4,
                    "title" => "Très bien",
                    "body" => "Commande reçue très rapidement. La qualité de l'impression est de bonne qualité.
                    Seul petit bémol : d'un flyer à un autre la couleur de fond était légèrement différente.",
                    "author" => "Bacha Amine",
                    "date" => now()->subDays(154)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 5,
                    "title" => "Parfait !",
                    "body" => "Cartes commandées un mardi à 11h, reçues le mercredi à 10h. Qualité au top, prix corrects.",
                    "author" => "El Hosni Taifi",
                    "date" => now()->subDays(100)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 4,
                    "title" => "Super réactif",
                    "body" => "Super réactif, efficace et produits livrés de qualités !",
                    "author" => "Damia Gajim",
                    "date" => now()->subDays(10)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 4,
                    "title" => "la qualité",
                    "body" => "la qualité , le serieux et la rapidité et aussi le prix",
                    "author" => "Said Bounaceaur",
                    "date" => now()->subDays(35)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 5,
                    "title" => "Satisfaite de ma 1ère commande",
                    "body" => "commande en ligne facile. bon rapport qualité/prix. traitement rapide.",
                    "author" => "Arije Assil",
                    "date" => now()->subDays(10)->translatedFormat("M d Y")
                ],
            ]
        ]);
    }
}
