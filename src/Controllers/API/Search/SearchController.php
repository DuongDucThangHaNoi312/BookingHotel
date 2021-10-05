<?php

namespace BookingHotel\Controllers\API\Search;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\Request;
use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;
use Exception;

class SearchController
{
    public function getSearchHotels()
    {
        $locationID = Request::getIDOnURL();
        $aData = [];
        $aHotel = HotelModel::getHotelsWithLocationID($locationID);
        foreach ($aHotel as $aItem) {
            $aData[] = [
                'MaKS'       => $aItem[1],
                'tenKS'      => $aItem[2],
                'content'    => the_excerpt($aItem[3]),
                'diaChi'     => $aItem[4],
                'tenMien'    => $aItem[5],
                'email'      => $aItem[6],
                'website'    => $aItem[7],
                'rating'     => $aItem[8],
                'image'      => json_decode($aItem[9], true),
                'createDate' => $aItem[10],
            ];
        }
        echo HandleResponse::success('list hotels', [
            'items' => $aData,
            'total' => count($aData)
        ]);
    }

    public function getSearchHotel()
    {
        $aData=$_POST;
        $aResult=[];
        try {
            if (checkDataIsset(['s'],$aData)){
                if (checkDataEmpty($aData)){
                    $aHotel=HotelModel::getHotelBySearchName($aData['s']);
                    if (!empty($aHotel)){
                        foreach ($aHotel as $aItem) {
                            $aResult[] = [
                                'MaKS'       => $aItem[1],
                                'tenKS'      => $aItem[2],
                                'content'    => the_excerpt($aItem[3]),
                                'diaChi'     => $aItem[4],
                                'tenMien'    => $aItem[5],
                                'email'      => $aItem[6],
                                'website'    => $aItem[7],
                                'rating'     => $aItem[8],
                                'image'      => json_decode($aItem[9], true),
                                'createDate' => $aItem[10],
                            ];
                        }
                    }
                    echo HandleResponse::success('list hotels', [
                        'items' => $aResult,
                        'total' => count($aResult)
                    ]);
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(),$exception->getCode());
        }
    }
}