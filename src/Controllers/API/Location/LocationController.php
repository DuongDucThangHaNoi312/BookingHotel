<?php

namespace BookingHotel\Controllers\API\Location;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\LocationModel;

class LocationController
{
    public function getLocation($aData)
    {
        $aLocation = LocationModel::getLocation($aData['ID']);
        $aLocation['image'] = json_decode(LocationModel::getLocation($aData['ID'])['image'], true);
        echo HandleResponse::success('data hotel', $aLocation);
    }

    public function getLocations()
    {
        $aData = [];
        $aLocation = LocationModel::getLocations();
        foreach ($aLocation as $aItem) {
            $aData[] = [
                'MaDD'       => $aItem[0],
                'tenDD'      => $aItem[1],
                'content'    => $aItem[2],
                'diaChi'     => $aItem[3],
                'image'      => json_decode($aItem[4], true),
                'createDate' => $aItem[5],
                'total'      => HotelModel::getCountHotelLocation($aItem[0])
            ];
        }
        echo HandleResponse::success('list Location', $aData);
    }
}