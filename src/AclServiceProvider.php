<?php

namespace Tir\Acl;

use Tir\Acl\EventServiceProvider;
use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
