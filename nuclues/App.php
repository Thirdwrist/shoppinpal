<?php

namespace App\Nucleus;

use Exception;

class App
{
    /**
     * All registered keys.
     *
     * @var array
     */
    protected static $registry = [];

    /**
     * Bind a new key/value into the container.
     *
     * @param  string $key
     * @param  mixed  $value
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * get values out app of registry 
     *
     * @param string $key
     * @return mixed $value
     */
    public static function get($key)
    {
        if (! array_key_exists($key, static::$registry)) {
            throw new Exception("No {$key} is bound in the container.");
        }

        return static::$registry[$key];
    }
}
