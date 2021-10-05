<?php

namespace BookingHotel\Controllers\Shop\Search;

use BookingHotel\Models\LocationModel;
use BookingHotel\Models\OrderModel;
use BookingHotel\Models\RoomModel;

class SearchController
{
    public function showViewSearch()
    {
        $aData = $_POST;
        $starDate = date('y-m-d', strtotime($aData['chekInDate']));
        $endDate = date('y-m-d', strtotime($aData['checkOutDate']));
        $listIDRoomHasOrder = OrderModel::getListRoomOrderBetweenDate($starDate, $endDate);
        $aLocation=LocationModel::getLocation($aData['MaDD']);
        include 'src/Views/Shop/Search/SearchHotel.php';
    }
}