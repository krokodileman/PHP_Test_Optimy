<?php

namespace App;

class App
{

    private static $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }


    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}
