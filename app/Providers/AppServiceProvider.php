<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Orders;
use App\User;

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
        Blade::directive('money', function ($money) {
            return "<?= number_format($money, 2); ?>";
        });
        View::composer('parts.navbar', function($view){
            $view->with(['ordersInfo' => Orders::where('status', null)->where('party', null)->get()]);
        });
        View::composer('parts.navbar', function($view){
            $view->with(['usersInfo' => User::where('role','!=', 'admin')->take(3)->get()]);
        });
    }
}
