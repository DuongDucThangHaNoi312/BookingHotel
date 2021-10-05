<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class BlogModel
{
    public static function insert($aData): int
    {
        $DB = DB::Connect();
        $query
            = $DB->query("INSERT INTO `blogs`(`id`,`name`, `content`, `imgUser`, `user`, `type`, `favorite`, `comment`, `createDate`) VALUES (null,'" .
            $aData['name'] . "','" . $aData['content'] . "','" . $aData['imgUser'] . "','" . $aData['user'] . "','" .
            $aData['type'] . "','" . $aData['favorite'] .
            "','" . $aData['comment']  . "',null)");
        return ($query) ? $DB->insert_id : 0;
    }

    public static function getBlogs()
    {
        return DB::Connect()->query("SELECT * FROM blogs")->fetch_all();
    }

    public static function getBlog($id): ?array
    {
        $sql = "SELECT * FROM blogs WHERE id = " . $id;
        return DB::Connect()->query($sql)->fetch_assoc();
    }


    public static function delete($id)
    {
        return DB::Connect()->query("DELETE FROM `blogs` WHERE id='" . $id . "'");
    }

    public static function update($id, $aData)
    {
        $query = [];
        if ($aData['name'] ?? '') {
            $query[] = " name ='" . $aData['name'] . "'";
        }
        if ($aData['content'] ?? '') {
            $query[] = " content ='" . $aData['content'] . "'";
        }
        if ($aData['imgUser'] ?? '') {
            $query [] = " imgUser = '" . $aData['imgUser'] . "'";
        }
        if ($aData['user'] ?? '') {
            $query [] = " user = '" . $aData['user'] . "'";
        }
        if ($aData['imgUser'] ?? '') {
            $query [] = " imgUser = '" . $aData['imgUser'] . "'";
        }
        if ($aData['type'] ?? '') {
            $query [] = " type = '" . $aData['type'] . "'";
        }
        if ($aData['favorite'] ?? '') {
            $query [] = " favorite = '" . $aData['favorite'] . "'";
        }
        if ($aData['comment'] ?? '') {
            $query [] = " comment = '" . $aData['comment'] . "'";
        }
      
        return DB::Connect()->query("UPDATE `blogs` SET " . implode(',', $query) .
            ",`createDate`=null WHERE id='" . $id . "'");
    }


}