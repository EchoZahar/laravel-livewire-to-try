<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CartCountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->cartCount();
    }

    public function cartCount() {
        View::composer('layouts.app', function ($view) {
            $view->with('cartCount', \Cart::getTotalQuantity());
        });
    }
}
