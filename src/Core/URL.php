<?php

namespace BookingHotel\Core;

class URL
{
    public static function redirect(string $uri = ''): string
    {
        header("Location: " . self::uri($uri));
        exit();
    }

    public static function uri($uri = ''): string
    {
        $defaultURL = App::get('config/app')['HomeBase'];
        return empty($uri) ? $defaultURL : $defaultURL . $uri;
    }
}