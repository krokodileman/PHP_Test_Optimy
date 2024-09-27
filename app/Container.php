<?php

namespace App;

class Container
{
    protected $bindings = [];

    public function bind($key, $callable)
    {
        $this->bindings[$key] = $callable;
    }

    public function resolve($key)
    {
        if (!isset($this->bindings[$key])) {
            throw new \Exception("No bindings found for the key: {$key}");
        }

        return call_user_func($this->bindings[$key]);
    }
}
