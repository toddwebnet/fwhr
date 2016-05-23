<?php

session_start();

class ToddSession
{
    public static function getSessionValue($key)
    {
        if (array_key_exists($key, $_SESSION))
        {
            return $_SESSION[$key];
        }
        else
        {
            return null;
        }

    }

    public static function setSessionArray($array)
    {
        foreach ($array as $key => $value)
        {
            self::setSessionValue($key, $value);
        }
    }

    public static function setSessionValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function flushSession()
    {
        foreach($_SESSION as $key=>$notUsed)
        {
            unset($_SESSION[$key]);
        }
    }
}