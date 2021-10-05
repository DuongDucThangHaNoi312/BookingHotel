<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class OrderModel
{
    public static function insert($aData)
    {
        $connect = DB::Connect();
        $sql
            = "INSERT INTO `orders`(`MaOrder`, `MaPhong`, `MaUser`, `info`, `startDate`, `endDate`, `gia`, `createDate`) VALUES (null,'" .
            $aData['MaPhong'] . "','" . $aData['MaUser'] . "','" . $aData['info'] . "','" . $aData['startDate'] .
            "','" .
            $aData['endDate'] . "','" . $aData['gia'] . "',null)";
        $insert = $connect->query($sql);
        if ($insert) {
            return $connect->insert_id;
        }
        return 0;
    }

    public static function checkUserOrderRoom($userID, $roomID): bool
    {
        $query = self::getOrderIDWithUserIDAndRoomID($userID, $roomID);
        return !empty($query);
    }

    public static function getOrderIDWithUserIDAndRoomID($userID, $roomID)
    {
        $query = DB::Connect()->query("SELECT MaOrder FROM orders WHERE MaUser=" . $userID . " AND MaPhong= '" .
            $roomID . "'")->fetch_assoc();
        return !empty($query) ? $query['MaOrder'] : 0;
    }

    public static function getListRoomOrderBetweenDate(string $startDate, string $endDate)
    {
        $sql = "SELECT DISTINCT MaPhong FROM orders WHERE DATE(startDate) BETWEEN '{$startDate}' AND '{$endDate}'";
        $query = DB::Connect()->query($sql)->fetch_all();
        return is_array($query) ? $query : [];
    }
}