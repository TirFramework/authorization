<?php
namespace Tir\Acl;

use Tir\Crud\Events\CrudEvent;
use Tir\Acl\Listeners\TestListener;
use Tir\Acl\Listeners\AccessLevelControlListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the Acl Package.
     *
     * @var array
     */
    protected $listen = [
        CrudEvent::class => [
            AccessLevelControlListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
