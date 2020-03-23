<?php

namespace Tir\Acl\Listeners;

use Tir\Acl\Acl;
use Tir\Crud\Events\CrudEvent;


class AccessLevelControlListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  CrudEvent  $eventName
     * @return void
     */
    public function handle(CrudEvent $event)
    {
        $permission = ['permission'=>Acl::checkAccess($event->crudName, $event->crudMethod)];
        return $permission;
    }
}
