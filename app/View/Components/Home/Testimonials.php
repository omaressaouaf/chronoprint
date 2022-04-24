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
                    "rating" => 5,
                    "title" => "Service rapide, de qualité, conforme à la demande et economique",
                    "author" => [
                        "name" => "Mohamed Belkhir",
                        "job" => "CEO & Founder MB14 BRAND"
                    ],
                    "date" => now()->subDays(2)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 5,
                    "title" => "Service rapide, prix correct et excellente impression",
                    "author" => [
                        "name" => "Mem Douh",
                        "job" => "Co-founder Z gaming agency"
                    ],
                    "date" => now()->subDays(50)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 3,
                    "title" => "Tarifs et expédition correct",
                    "author" => [
                        "name" => "J Mathias Bennett",
                        "job" => "Advisor Indigenous Stewardship Fund"
                    ],
                    "date" => now()->subDays(32)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 5,
                    "title" => "Tout est hyper pratique. Ne changez rien",
                    "author" => [
                        "name" => "Ahmed Silla",
                        "job" => "IT team leader chez micode"
                    ],
                    "date" => now()->subDays(9)->translatedFormat("M d Y")
                ],
                [
                    "rating" => 4,
                    "title" => "Sérieux - Tarifs intéressants - Délais courts et Bonne qualité",
                    "author" => [
                        "name" => "Reda Jemli",
                        "job" => "CTO chez Envato Maroc"
                    ],
                    "date" => now()->subDays(7)->translatedFormat("M d Y")
                ],
            ]
        ]);
    }
}
