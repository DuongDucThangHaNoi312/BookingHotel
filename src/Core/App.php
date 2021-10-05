<?php


namespace BookingHotel\Core;


class App
{
    private static array $aRegistry = [];

    public static function bind($key, $val)
    {
        self::$aRegistry[$key] = $val;
    }

    public static function get($key)
    {
        return array_key_exists($key, self::$aRegistry)?self::$aRegistry[$key]:false;
    }

}