<?php

namespace Mwyatt\Core;

class Session
{


    /**
     * good idea?
     */
    public function __construct()
    {
        session_start();
    }


    public function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }


    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public function pull($key, $default = null)
    {
        if (empty($_SESSION[$key])) {
            return $default;
        }
        $value = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $value;
    }
}
