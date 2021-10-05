<?php

namespace BookingHotel\Controllers\API\Forum;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Models\BlogModel;
use BookingHotel\Models\ForumModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class ForumController
{
    use TrainGetTokenHeader, TrainJWT;

    public function getForum($aData)
    {
        $forum = ForumModel::getForum($aData['ID']);
        echo HandleResponse::success('forum', $forum);
    }

    public function getForums()
    {
        $aData = [];
        $forums = ForumModel::getForums();
        foreach ($forums as $aItem) {
            $aData[] = [
                'id'         => $aItem[0],
                'user'       => $aItem[1],
                'imgUser'    => $aItem[2],
                'content'    => $aItem[3],
                'blog_id'       => $aItem[4],
                'createDate'       => $aItem[5],
            ];
        }
        echo HandleResponse::success('forums', $aData);
    }


    // public function createHotel()
    // {
    //     $aData = $_POST;
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataIsset(['tenKS', 'diaChi', 'tenMien', 'email', 'website'], $aData)) {
    //             if (checkDataEmpty($aData)) {
    //                 if (!HotelModel::isEmailExist($aData['email'])) {
    //                     if ($this->verifyToken($aData['token'])) {
    //                         $status = HotelModel::insert($aData);
    //                         if ($status) {
    //                             echo HandleResponse::success('create the hotel successfully');
    //                         } else {
    //                             throw new Exception('create the hotel errors', 401);
    //                         }
    //                     }
    //                 } else {
    //                     throw new Exception('Sorry,the email is exist');
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }

    // public function updateHotel($aData)
    // {
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataEmpty($aData)) {
    //             if (checkDataIsset(['MaKS'], $aData)) {
    //                 if ($this->verifyToken($aData['token'])) {
    //                     if (!HotelModel::isEmailExist($aData['email'])) {
    //                         $status = HotelModel::update($aData['MaKS'], $aData);
    //                         if ($status) {
    //                             echo HandleResponse::success('The hotel is update successfully');
    //                         } else {
    //                             throw new Exception('The hotel is update not successfully', 401);
    //                         }
    //                     } else {
    //                         throw new Exception('Sorry,the email is exist');
    //                     }
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }

    // public function deleteHotel($aData)
    // {
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataEmpty($aData)) {
    //             if ($this->verifyToken($aData['token'])) {
    //                 $status = HotelModel::delete($aData['ID']);
    //                 if ($status) {
    //                     echo HandleResponse::success('The hotel is delete successfully');
    //                 } else {
    //                     throw new Exception('The hotel is delete not successfully', 401);
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }
}
