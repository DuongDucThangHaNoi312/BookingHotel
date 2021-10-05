<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class HotelModel
{
    public static function insert($aData): int
    {
        $DB = DB::Connect();
        $query
            = $DB->query("INSERT INTO `hotels`(`MaKS`,`MaDD`, `tenKS`, `content`, `diaChi`, `tenMien`, `email`, `website`, `rating`, `image`, `createDate`) VALUES (null,'" .
            $aData['MaDD'] . "','" . $aData['tenKS'] . "','" . $aData['content'] . "','" . $aData['diaChi'] . "','" .
            $aData['tenMien'] . "','" . $aData['email'] .
            "','" . $aData['website'] . "',5,'" . $aData['image'] . "',null)");
        return ($query) ? $DB->insert_id : 0;
    }

    public static function getHotels()
    {
        return DB::Connect()->query("SELECT * FROM hotels")->fetch_all();
    }

    public static function getHotelsWithLocationID($locationID)
    {
        return DB::Connect()->query("SELECT * FROM hotels WHERE MaDD='.$locationID.'")->fetch_all();
    }

    public static function getCountHotelLocation($MaDD)
    {
        $query = DB::Connect()->query("SELECT count(MaKS) as count FROM hotels WHERE MaDD='{$MaDD}'")->fetch_assoc();
        return !empty($query) ? $query['count'] : 0;
    }

    public static function getHotelBySearchName($s)
    {
        return DB::Connect()->query("SELECT * FROM hotels WHERE TenKS like '%" . $s . "%'")->fetch_all();
    }

    public static function getHotel($id): ?array
    {
        $sql = "SELECT * FROM hotels WHERE MaKS = " . $id;
        return DB::Connect()->query($sql)->fetch_assoc();
    }

    public static function update($MaKS, $aData)
    {
        $query = [];
        if ($aData['tenKS'] ?? '') {
            $query[] = " tenKS ='" . $aData['tenKS'] . "'";
        }
        if ($aData['diaChi'] ?? '') {
            $query[] = " diaChi ='" . $aData['diaChi'] . "'";
        }
        if ($aData['tenMien'] ?? '') {
            $query [] = " tenMien = '" . $aData['tenMien'] . "'";
        }
        if ($aData['email'] ?? '') {
            $query [] = " email = '" . $aData['email'] . "'";
        }
        if ($aData['website'] ?? '') {
            $query [] = " website = '" . $aData['website'] . "'";
        }
        if ($aData['content'] ?? '') {
            $query [] = " content = '" . $aData['content'] . "'";
        }
        if ($aData['images'] ?? '') {
            $query [] = " image = '" . json_encode($aData['images']) . "'";
        }
        return DB::Connect()->query("UPDATE `hotels` SET " . implode(',', $query) .
            ",`createDate`=null WHERE MaKS='" . $MaKS . "'");
    }

    public static function delete($MaKS)
    {
        return DB::Connect()->query("DELETE FROM `hotels` WHERE MaKS='" . $MaKS . "'");
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