<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        View::composer("partials.layout.navbar-bottom", function ($view) {
            $view->with([
                "categoryGroups" => CategoryGroup::orderBy("position")->with(["categories", "categories.products"])->get()
            ]);
        });

        View::composer("partials.layout.footer", function ($view) {
            $view->with([
                "popularCategories" => Category::inRandomOrder()->take(12)->get()
            ]);
        });

        View::composer("partials.products.filters", function ($view) {
            $view->with([
                "sortings" => [
                    "newest" => "Newest",
                    "popular" => "Popular",
                    "desc" => "A à Z",
                    "asc" => "Z à A"
                ]
            ]);
        });
    }
}
