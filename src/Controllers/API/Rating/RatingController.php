<?php

namespace BookingHotel\Controllers\API\Rating;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\Request;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Core\URL;
use BookingHotel\Models\CommentModel;
use BookingHotel\Models\OrderModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class RatingController
{
    use TrainGetTokenHeader, TrainJWT;

    public function checkUserOrderRoom()
    {
        $aData = $_POST;
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataIsset(['token', 'MaPhong'], $aData)) {
                if (checkDataEmpty($aData)) {
                    if ($this->verifyToken($aData['token'], true)) {
                        $oUser = $this->decodeJWT($aData['token']);
                        $status = OrderModel::checkUserOrderRoom($oUser->ID, $aData['MaPhong']);
                        echo HandleResponse::success('success', [
                            'isUserBookRoom' => $status
                        ]);
                    } else {
                        throw new Exception('User not permission access', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getListRatingRoom()
    {
        $maPhong = Request::getIDOnURL();
        try {
            $aData = [];
            $aRating = CommentModel::getCommentsByMaPhong($maPhong);
            if (!empty($aRating)) {
                foreach ($aRating as $item) {
                    $aData[] = [
                        'hoTen'      => $item[0],
                        'content'    => $item[1],
                        'rating'     => $item[2],
                        'createDate' => $item[3],
                    ];
                }
            }
            echo HandleResponse::success('list rating', [
                'items' => $aData
            ]);
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function createRatingRoom()
    {
        $aData = $_POST;
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataIsset(['token', 'MaPhong', 'content', 'rating'], $aData)) {
                if (checkDataEmpty($aData)) {
                    if ($this->verifyToken($aData['token'], true)) {
                        $oUser = $this->decodeJWT($aData['token']);
                        $maOrder = OrderModel::getOrderIDWithUserIDAndRoomID($oUser->ID, $aData['MaPhong']);
                        if ($id = CommentModel::insert([
                            'MaOrder' => $maOrder,
                            'MaPhong' => $aData['MaPhong'],
                            'content' => $aData['content'],
                            'rating'  => $aData['rating'],
                        ])) {
                            echo HandleResponse::success('The rating insert successfully', [
                                'id' => $id
                            ]);
                        } else {
                            throw new Exception('The rating insert error', 401);
                        }
                    } else {
                        throw new Exception('User not permission access', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }
}