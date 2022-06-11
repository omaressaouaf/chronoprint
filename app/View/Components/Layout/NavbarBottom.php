<?php

namespace App\View\Components\Layout;

use App\Models\CategoryGroup;
use Illuminate\View\Component;

class NavbarBottom extends Component
{
    public function render()
    {
        return view('components.layout.navbar-bottom', [
            "categoryGroups" => CategoryGroup::orderBy("position")
                ->with(["categories", "categories" => fn ($query) => $query->active()])
                ->get()
        ]);
    }
}
