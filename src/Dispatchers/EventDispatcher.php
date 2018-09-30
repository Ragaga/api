<?php

namespace App\Dispatchers;

interface EventDispatcher
{
    public function dispatchAll(array $events);
    public function dispatch($event);
}