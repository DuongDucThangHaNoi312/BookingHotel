<?php

namespace BookingHotel\Controllers\API\Hotels;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\LocationModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class HotelsController
{
    use TrainGetTokenHeader, TrainJWT;

    public function getHotel($aData)
    {
        $aHotel = HotelModel::getHotel($aData['ID']);
        $aHotel['image'] = json_decode(HotelModel::getHotel($aData['ID'])['image'], true);
        echo HandleResponse::success('data hotel', $aHotel);
    }

    public function getHotels()
    {
        $aData = [];
        $aHotel = HotelModel::getHotels();
        foreach ($aHotel as $aItem) {
            $aDiaDiem = LocationModel::getLocation($aItem[1]);
            $aDiaDiem['image'] = json_decode(LocationModel::getLocation($aItem[1])['image'], true);
            $aData[] = [
                'MaKS'       => $aItem[1],
                'tenKS'      => $aItem[2],
                'diaDiem'    => $aDiaDiem,
                'content'    => $aItem[3],
                'diaChi'     => $aItem[4],
                'tenMien'    => $aItem[5],
                'email'      => $aItem[6],
                'website'    => $aItem[7],
                'rating'     => $aItem[8],
                'image'      => json_decode($aItem[9], true),
                'createDate' => $aItem[10],
            ];
        }
        echo HandleResponse::success('list hotels', $aData);
    }

    public function createHotel()
    {
        $aData = $_POST;
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataIsset(['tenKS', 'diaChi', 'tenMien', 'email', 'website'], $aData)) {
                if (checkDataEmpty($aData)) {
                    if (!HotelModel::isEmailExist($aData['email'])) {
                        if ($this->verifyToken($aData['token'])) {
                            $status = HotelModel::insert($aData);
                            if ($status) {
                                echo HandleResponse::success('create the hotel successfully');
                            } else {
                                throw new Exception('create the hotel errors', 401);
                            }
                        }
                    } else {
                        throw new Exception('Sorry,the email is exist');
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function updateHotel($aData)
    {
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataEmpty($aData)) {
                if (checkDataIsset(['MaKS'], $aData)) {
                    if ($this->verifyToken($aData['token'])) {
                        if (!HotelModel::isEmailExist($aData['email'])) {
                            $status = HotelModel::update($aData['MaKS'], $aData);
                            if ($status) {
                                echo HandleResponse::success('The hotel is update successfully');
                            } else {
                                throw new Exception('The hotel is update not successfully', 401);
                            }
                        } else {
                            throw new Exception('Sorry,the email is exist');
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function deleteHotel($aData)
    {
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataEmpty($aData)) {
                if ($this->verifyToken($aData['token'])) {
                    $status = HotelModel::delete($aData['ID']);
                    if ($status) {
                        echo HandleResponse::success('The hotel is delete successfully');
                    } else {
                        throw new Exception('The hotel is delete not successfully', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }
}