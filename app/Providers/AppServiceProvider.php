<?php

namespace App\Providers;

use App\Models\Status;
use App\Models\Category;
use Illuminate\View\View;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $categories = \Cache::rememberForever('categories', function () {
                return Category::all();
            });
            $statuses = \Cache::rememberForever('statuses', function () {
                return Status::all();
            });
            $view->with('categories', $categories);
            $view->with('statuses', $statuses);
        });

        // view()->composer('*', function ($view) {
        //     $statuses = \Cache::rememberForever('statuses', function () {
        //         return Status::all();
        //     });
        //     $view->with('statuses', $statuses);
        // });
    }
}
