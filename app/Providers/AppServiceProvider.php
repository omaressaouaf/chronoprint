<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer("voyager::dashboard.navbar", function ($view) {
            /** @var \App\Models\User */
            $authUser = auth()->user();

            $view->with([
                'notifications' => $authUser->notifications()->latest()->take(15)->get()
            ]);
        });

    }
}
