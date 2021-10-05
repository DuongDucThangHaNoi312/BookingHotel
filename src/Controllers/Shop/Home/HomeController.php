<?php

namespace BookingHotel\Controllers\Shop\Home;

use BookingHotel\Core\App;

class HomeController
{
    public function getView($aData)
    {
        return include 'src/Views/Shop/Home/Home.php';
    }
}