<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class LocationModel
{
    public static function insert($aData): int
    {
        $DB = DB::Connect();
        $query
            = $DB->query("INSERT INTO `locations`(`MaDD`, `tenDD`, `content`, `diaChi`, `image`, `createDate`) VALUES (null,'" .
            $aData['tenDD'] . "','" . $aData['content'] . "','" . $aData['diaChi'] . "','" . $aData['image'] .
            "',null)");
        return ($query) ? $DB->insert_id : 0;
    }

    public static function getLocations()
    {
        return DB::Connect()->query("SELECT * FROM locations")->fetch_all();
    }

    public static function getLocation($id): ?array
    {
        $sql = "SELECT * FROM locations WHERE MaDD = " . $id;
        return DB::Connect()->query($sql)->fetch_assoc();
    }

    public static function update($MaDD, $aData)
    {
        $query = [];
        if ($aData['tenDD'] ?? '') {
            $query[] = " tenDD ='" . $aData['tenDD'] . "'";
        }
        if ($aData['diaChi'] ?? '') {
            $query[] = " diaChi ='" . $aData['diaChi'] . "'";
        }
        if ($aData['content'] ?? '') {
            $query [] = " content = '" . $aData['content'] . "'";
        }
        if ($aData['images'] ?? '') {
            $query [] = " image = '" . json_encode($aData['images']) . "'";
        }
        return DB::Connect()->query("UPDATE `locations` SET " . implode(',', $query) .
            ",`createDate`=null WHERE MaDD='" . $MaDD . "'");
    }

    public static function delete($MaDD)
    {
        return DB::Connect()->query("DELETE FROM `locations` WHERE MaDD='" . $MaDD . "'");
    }
}