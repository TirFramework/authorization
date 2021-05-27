<?php

namespace Tir\Authorization;

use Illuminate\Support\ServiceProvider;
use Tir\Authorization\Entities\Role;
use Tir\Authorization\Providers\SeedServiceProvider;
use Tir\User\Entities\User;

class AuthorizationServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/Routes/admin.php');

        $this->loadMigrationsFrom(__DIR__ .'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'authorization');

        $this->loadTranslationsFrom(__DIR__.'/Resources/Lang/', 'authorization');

        $this->app->register(SeedServiceProvider::class);

        $this->addDynamicRelations();
    }


     private function addDynamicRelations()
     {
         User::addDynamicRelation('roles', function (User $user) {
             return $user->belongsToMany(Role::class);
         });
     }
}
