<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\channel;
use App\Http\View\Composers\ChannelsComposer;
use App\PostCardSendingService;
use App\strMixins\StrMixins;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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


        //facades
        $this->app->singleton('Postcard', function($app) {
            return new PostCardSendingService('us', 80, 180);
        });
        //Macro
        /*
        Str::macro('partNumber',function($number){
            return 'ABC-'.substr($number, 0, 3).'-'.substr($number, 3);
        });*/
        Str::mixin(new StrMixins());

    }
}
