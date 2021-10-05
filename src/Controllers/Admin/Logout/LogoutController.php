<?php

namespace BookingHotel\Controllers\Admin\Logout;


use BookingHotel\Core\Session;
use BookingHotel\Core\URL;

class LogoutController
{
    public function handleLogout()
    {
        Session::destroyAll();
        URL::redirect('a.login');
    }
}