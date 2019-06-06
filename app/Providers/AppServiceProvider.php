<?php

namespace App\Providers;

use App\{Cart, Category, Company, OrderService, Project, Service, Message, Order};
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout', function($view){
            $view->with('services', Service::all());
            $view->with('categories', Category::all());
            $view->with('company', Company::latest()->first());
            $view->with('countProductsInCart', Cart::countProductsInCart());
        });
        view()->composer('admin.parts.sidebar', function($view){
            $view->with('countNewMessages', Message::countNewMessages());
            $view->with('countNewOrderServices', Order::countNewOrderServices());
            $view->with('countNewOrderProducts', Order::countNewOrderProducts());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
