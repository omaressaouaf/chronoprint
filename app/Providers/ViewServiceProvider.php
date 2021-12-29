<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("partials.navbar-bottom", function ($view) {
            $view->with([
                "categoryGroups" => CategoryGroup::with(["categories", "categories.products"])->get()
            ]);
        });

        View::composer("partials.footer", function ($view) {
            $view->with([
                "popularCategories" => Category::inRandomOrder()->take(12)->get()
            ]);
        });
    }
}
