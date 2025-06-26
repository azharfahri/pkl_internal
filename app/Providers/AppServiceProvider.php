<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view::composer('*', function ($view) {
            if (Auth::check()) {
                $latestOrder = Order::with(['orderProduct.product'])
                ->where('user_id',Auth::id())
                ->where('status','pending')
                ->latest()->first();

                $view->with('latestOrder',$latestOrder);
            }
        });
    }
}
