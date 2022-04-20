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
                    "title" => __('Smooth printing with') . ' ' . config('app.name'),
                    "description" => __('With few clicks you select your product and have the best printing service in morocco. 100% online with free delivery in casablanca. grow your brand with') . ' ' . config('app.name')
                ],
                [
                    "title" => __(":appName Business Cards", ["appName" => config("app.name")]),
                    "description" => __("Enjoy our high quality business cards with plenty of variations available :") . " Simple, PVC, Papier, Luxe, Double, Autre ...",
                ],
                [
                    "title" => __(":appName Flyers Brouchures", ["appName" => config("app.name")]),
                    "description" => __("And don't forget our special flyers. suitable for all kind of brands :") . " Dépliant 2 volets, Dépliant 3 volets, Dépliant 4 volets, Brochure A4, Brochure A5 ..."

                ],
                [
                    "title" => __(":appName Rollups and Stands", ["appName" => config("app.name")]),
                    "description" => __("Market your business with our Rollups and Stands suitable for the office and outside :") . " Rollups Standard, Rollups Moderne ..."

                ],
                [
                    "title" => __(":appName Packaging", ["appName" => config("app.name")]),
                    "description" => __("Brand your packaging and leaves your impression on your customers with our :") . " Packaging Etuis, Packaging luxe, Boite pâtisserie ..."

                ],
            ]
        ]);
    }
}
