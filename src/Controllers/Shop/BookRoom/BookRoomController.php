<?php

namespace BookingHotel\Controllers\Shop\BookRoom;

use BookingHotel\Core\TrainJWT;
use BookingHotel\Core\TrainQRCode;
use BookingHotel\Core\URL;
use BookingHotel\Models\OrderModel;
use BookingHotel\Models\UserModel;
use Exception;

class BookRoomController
{
    use TrainJWT, TrainQRCode;

    public function handleBookRoom()
    {
        try {
            $aData = $_POST;
            if (!UserModel::isEmailExist($aData['email'])) {
                URL::redirect('login');
                die();
                $aDataInsert = [
                    'username' => $aData['email'],
                    'password' => md5($aData['email']),
                    'email'    => $aData['email'],
                    'hoTen'    => $aData['fullName'],
                    'SDT'      => $aData['SDT'],
                ];
                $userID = UserModel::insert($aDataInsert);
            } else {
                $userID = UserModel::getIDWithEmail($aData['email']);
            }
            $aData['MaUser'] = $userID;
            $aData['info'] = json_encode([
                'hoTen'     => $aData['fullName'],
                'email'     => $aData['email'],
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
            echo json_encode(
                [
                    'data'    => [
                        'src' => $QRCode
                    ],
                    'message' => 'book Room successfully',
                    'status'  => 'success'
                ]
            );
            die();

        } catch (Exception $exception) {
            echo json_encode([
                'message' => $exception->getMessage(),
                'status'  => 'error'
            ]);
            die();
        }
    }
}