<?php

namespace App\Providers;

use App\Contracts\SmsSenderContract;
use App\Libraries\NexmoSender;
use App\Libraries\TwilioSender;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(SmsSenderContract::class,TwilioSender::class);
    }
}
