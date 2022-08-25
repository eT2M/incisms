<?php
namespace eT2M\InciSms;

use Illuminate\Support\ServiceProvider;

class InciSmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }
    public function register()
    {
        $this->app->singleton('incisms',function ($app){ 
            return new InciSms($app);
        });
    }
}