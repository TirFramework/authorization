<?php

namespace Tir\Authorization;

use Illuminate\Support\ServiceProvider;
use Tir\Authorization\Database\Seeders\DatabaseSeeder;
use Tir\Authorization\Entities\Role;
use Tir\Authorization\Middleware\AclMiddleware;
use Tir\Authorization\Providers\SeedServiceProvider;
use Tir\Crud\Support\Module\Module;
use Tir\Crud\Support\Module\Modules;
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
        $this->loadRoutesFrom(__DIR__ . '/Routes/admin.php');

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'authorization');
        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'role');


        $this->loadTranslationsFrom(__DIR__ . '/Resources/Lang/', 'authorization');

        $this->app->register(SeedServiceProvider::class);

        $this->app['router']->aliasMiddleware('acl', AclMiddleware::class);


        $this->addDynamicRelations();

        $this->registerModule();

        $this->adminMenu();
    }


    private function addDynamicRelations()
    {
        User::addDynamicRelation('roles', function (User $user) {
            return $user->belongsToMany(Role::class);
        });
    }


    private function registerModule()
    {
        $authorization = new Module();
        $authorization->setName('role')->enable();

        Modules::register($authorization);
    }

    private function adminMenu()
    {
        $menu = resolve('AdminMenu')->weight(10);
        $menu->item('system')->title('authorization::panel.system')->link('#')->add();
        $menu->item('system.users')->title('authorization::panel.users')->link('#')->add();
        $menu->item('system.users.roles')->title('authorization::panel.roles')->route('admin.role.index')->add();
    }
}
