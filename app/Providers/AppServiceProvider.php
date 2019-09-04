<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\channel;
use App\Http\View\Composers\ChannelsComposer;
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
        $this->app->singleton(PaymentGatewayContract::class, function($app){
            //dd($app);
            if(request()->has('credit'))
            {
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Option -1 every single view
        // view()->share('channels', channel::orderBy('name')->get());
        //View::share('channels', channel::orderBy('name')->get());

        //option -2 share a var with a Specific views
        /*
        view()->composer(['channel.index', 'post.*'], function ($view) {
            $view->with('channels',channel::orderBy('name')->get());
        });*/

        //option -3
        View::composer('partials.channels.*', ChannelsComposer::class);

    }
}
