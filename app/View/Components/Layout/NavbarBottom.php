<?php

namespace App\View\Components\Layout;

use App\Models\CategoryGroup;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class NavbarBottom extends Component
{
    public function render()
    {
        return view('components.layout.navbar-bottom', [
            "categoryGroups" => CategoryGroup::orderBy("position")->with(["categories", "categories.products"])->get()
        ]);
    }
}
