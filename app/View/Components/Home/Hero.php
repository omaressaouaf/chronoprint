<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Hero extends Component
{
    public function render()
    {
        return view('components.home.hero', [
            "sliders" => [
                [
                    "image" => "1.png",
                    "title" => __('Smooth printing with') . ' ' . config('app.name'),
                    "paragraph" => __('With few clicks you select your product and have the best printing service in morocco. 100% online with free delivery in casablanca. grow your brand with') . ' ' . config('app.name')
                ],
                [
                    "image" => "2.jpg",
                    "title" => __(":appName Business Cards", ["appName" => config("app.name")]),
                    "paragraph" => __("Enjoy our high quality business cards with plenty of variations available :") . " Simple, PVC, Papier, Luxe, Double, Autre ...",
                ],
                [
                    "image" => "3.jpg",
                    "title" => __(":appName Flyers Brouchures", ["appName" => config("app.name")]),
                    "paragraph" => __("And don't forget our special flyers. suitable for all kind of brands :") . " Dépliant 2 volets, Dépliant 3 volets, Dépliant 4 volets, Brochure A4, Brochure A5 ..."

                ],
            ]
        ]);
    }
}
