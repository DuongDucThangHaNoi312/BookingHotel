<?php


namespace BookingHotel\Core;


class Request
{
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getIDOnURL(): int
    {
        $aURI = explode('/', self::uri());
        return (int)$aURI[1] ?? 0;
    }

    public static function uri()
    {
        return str_replace(App::get('config/app')['HomeURL'], '', $_SERVER['REQUEST_URI']);
    }
}