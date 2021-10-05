<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class ForumModel
{
    public static function insert($aData): int
    {
        $DB = DB::Connect();
        $query

            = $DB->query("INSERT INTO `forums`(`id`, `user`,`imgUser`,`content`, `blog_id`, `createDate`) VALUES (null,'" .
            $aData['user'] . "','" . $aData['imgUser'] . "','" . $aData['content'] . "','" . $aData['blog_id']  . "',null)");
        return ($query) ? $DB->insert_id : 0;
    }

    public static function getForums()
    {
        return DB::Connect()->query("SELECT * FROM forums")->fetch_all();
    }

    public static function getForum($id): ?array
    {
        $sql = "SELECT * FROM forums WHERE id = " . $id;
        return DB::Connect()->query($sql)->fetch_assoc();
    }


}