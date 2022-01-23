<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GraphicServiceController extends Controller
{
    public function __invoke()
    {
        return view("graphic-services", [
            "categories" => Category::whereIsGraphicService(true)->get()
        ]);
    }
}
