<?php

namespace BookingHotel\Controllers\Shop\Display;

use BookingHotel\Core\TrainQRCode;

class DisplayController
{
    use TrainQRCode;
    public function getListHotel()
    {
        return include('src/Views/Shop/Display/ListHotels.php');
    }

    public function getDetailsRoom()
    {
        return include('src/Views/Shop/Display/DetailsRoom.php');
    }
}