<?php

namespace BookingHotel\Models;

use BookingHotel\Database\DB;

class CommentModel
{
    public static function insert($aData)
    {
        $connect = DB::Connect();
        $sql
            = "INSERT INTO `commentShop`(`MaCMMS`, `MaOrder`,`MaPhong`, `content`, `rating`, `createDate`) VALUES (null,'{$aData['MaOrder']}','{$aData['MaPhong']}','{$aData['content']}','{$aData['rating']}',null)";
        $insert = $connect->query($sql);
        if ($insert) {
            return $connect->insert_id;
        }
        return 0;
    }

    public static function getCommentsByMaPhong($MaPhong): array
    {
        $sql
            = "SELECT users.hoTen,cmms.content,cmms.rating,cmms.createDate FROM commentShop as cmms join orders on cmms.MaOrder = orders.MaOrder join users on users.ID=orders.MaUser where cmms.MaPhong={$MaPhong}";
        $query = DB::Connect()->query($sql);
        return ($query->num_rows > 0) ? $query->fetch_all() : [];
    }

    public static function getSumCommentRating($MaPhong, $rating): int
    {
        $query = DB::Connect()
            ->query("SELECT sum(rating) as sum FROM commentShop WHERE MaPhong={$MaPhong} AND rating={$rating}");
        return ($query->num_rows > 0) ? (int)($query->fetch_assoc())['sum'] : 0;
    }

    public static function getSumCommentRatings($MaPhong): int
    {
        $query = DB::Connect()
            ->query("SELECT count(MaCMMS) as sum FROM commentShop WHERE MaPhong={$MaPhong}");
        return ($query->num_rows > 0) ? (int)($query->fetch_assoc())['sum'] * 5 : 0;
    }
}