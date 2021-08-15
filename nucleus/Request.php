<?php

namespace App\Nucleus;

class Request
{
    /**
     * Fetch the request URI.
     *
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Fetch the request method.
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    /**
     * Get request body parameter
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        if(array_key_exists($key, static::all())){
            return static::all()[$key];
        }

        return $default;
    }

    /**
     * Get all request body content
     *
     * @return array
     */
    public static function all()
    {
        return json_decode(file_get_contents("php://input"), true);
    }
}
