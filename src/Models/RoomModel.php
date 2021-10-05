<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class RoomModel
{
    public static function insert($aData): int
    {
        $DB = DB::Connect();
        $query
            = $DB->query("INSERT INTO `rooms`(`MaPhong`, `MaKS`, `tenPhong`, `content`, `gia`,  `image`, `createDate`) VALUES (null,'" .
            $aData['MaKS'] . "','" . $aData['tenPhong'] . "','" . $aData['content'] . "','" . $aData['gia'] . "','" .
            $aData['image'] . "',null)");
        return ($query) ? $DB->insert_id : 0;
    }

    public static function getRooms()
    {
        return DB::Connect()->query("SELECT * FROM rooms")->fetch_all();
    }

    public static function getRoomsByMaKS($MaKS)
    {
        return DB::Connect()->query("SELECT * FROM rooms WHERE MaKS='.$MaKS.'")->fetch_all();
    }

    public static function getRoom($id): ?array
    {
        $sql = "SELECT * FROM rooms WHERE MaPhong = " . $id;
        return DB::Connect()->query($sql)->fetch_assoc();
    }

    public static function update($MaPhong, $aData)
    {
        $query = [];
        if ($aData['tenPhong'] ?? '') {
            $query[] = " tenPhong ='" . $aData['tenPhong'] . "'";
        }
        if ($aData['MaKS'] ?? '') {
            $query[] = " MaKS ='" . $aData['MaKS'] . "'";
        }
        if ($aData['gia'] ?? '') {
            $query [] = " gia = '" . $aData['gia'] . "'";
        }
        if ($aData['content'] ?? '') {
            $query [] = " content = '" . $aData['content'] . "'";
        }
        if ($aData['images'] ?? '') {
            $query [] = " image = '" . json_encode($aData['images']) . "'";
        }
        return DB::Connect()->query("UPDATE `rooms` SET " . implode(',', $query) .
            ",`createDate`=null WHERE MaPhong='" . $MaPhong . "'");
    }

    public static function delete($MaPhong)
    {
        return DB::Connect()->query("DELETE FROM `rooms` WHERE MaPhong='" . $MaPhong . "'");
    }

    public static function isEmailExist($email): bool
    {
        return !empty(self::getIDWithEmail($email));
    }

    public static function getIDWithEmail($email): int
    {
        $result = DB::Connect()->query("SELECT MaKS FROM hotels WHERE email='" . $email . "'");
        return ($result->num_rows > 0) ? ($result->fetch_assoc())['MaKS'] : 0;
    }
}