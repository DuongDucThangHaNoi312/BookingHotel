<?php

namespace BookingHotel\Controllers\Shop\Comment;

use BookingHotel\Core\URL;
use BookingHotel\Models\CommentModel;
use Exception;

class CommentController
{
    public function handleComment()
    {
        $aData = $_POST;
        $aData['rating'] = (int)$_POST['star'];

        try {
            if (checkDataIsset(['MaOrder', 'MaPhong','rating', 'content'], $aData)) {
                if (checkDataEmpty($aData)) {
                    $status= CommentModel::insert($aData);
                    URL::redirect('detailsRoom/' . $aData['MaPhong']);
                }
            }
        } catch (Exception $exception) {
            URL::redirect('detailsRoom/' . $aData['MaPhong']);
        }
    }
}