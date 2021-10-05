<?php

namespace BookingHotel\Controllers\API\BookRoom;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\Request;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Core\TrainQRCode;
use BookingHotel\Models\OrderModel;
use BookingHotel\Models\UserModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class BookRoomController
{
    use TrainJWT, TrainQRCode, TrainGetTokenHeader;

    public function handleBookRoom()
    {
        $aData = $_POST;
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataIsset([
                'token',
                'MaPhong',
                'startDate',
                'endDate',
                'SDT',
                'tenPhong',
                'gia',
                'request',
            ],
                $aData)) {
                if (checkDataEmpty($aData)) {
                    if ($this->verifyToken($aData['token'], true)) {
                        $oUser = $this->decodeJWT($aData['token']);
                        if (UserModel::isEmailExist($oUser->email)) {
                            $userID = $oUser->ID;
                            $aData['MaUser'] = $userID;
                            $aData['info'] = json_encode([
                                'hoTen'     => $oUser->hoTen,
                                'email'     => $oUser->email,
                                'startDate' => $aData['startDate'],
                                'endDate'   => $aData['endDate'],
                                'sdt'       => $aData['SDT'],
                                'gia'       => $aData['gia'],
                                'tenPhong'  => $aData['tenPhong'],
                                'request'   => $aData['request']
                            ]);
                            if (OrderModel::checkUserOrderRoom($userID, $aData['MaPhong'])) {
                                $QRCode = UserModel::getQRCode($userID);
                            } else {
                                $orderID = OrderModel::insert($aData);
                                if ($orderID) {
                                    $aPayload = $this->encodeJWT($aData['info']);
                                    $QRCode = $this->getURLQRCode($aPayload);
                                    UserModel::updateQRCode($userID, $QRCode);
                                } else {
                                    throw new Exception('the order insert error');
                                }
                            }
                            echo HandleResponse::success('Congratulations,The user book room successfully', [
                                'qrcode' => $QRCode
                            ]);
                        } else {
                            throw new Exception('Sorry,The account must login');
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