<?php

namespace BookingHotel\Controllers\API\Blog;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Models\BlogModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class BlogController
{
    use TrainGetTokenHeader, TrainJWT;

    public function getBlog($aData)
    {
        $blog = BlogModel::getBlog($aData['ID']);
        echo HandleResponse::success('blog', $blog);
    }

    public function getBlogs()
    {
        $aData = [];
        $blogs = BlogModel::getBlogs();
        foreach ($blogs as $aItem) {
            $aData[] = [
                'id'         => $aItem[0],
                'name'       => $aItem[1],
                'content'    => $aItem[2],
                'imgUser'    => $aItem[3],
                'user'       => $aItem[4],
                'type'       => $aItem[5],
                'favorite'   => $aItem[6],
                'createDate' => $aItem[7],
            ];
        }
        echo HandleResponse::success('blogs', $aData);
    }


    // public function createHotel()
    // {
    //     $aData = $_POST;
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataIsset(['tenKS', 'diaChi', 'tenMien', 'email', 'website'], $aData)) {
    //             if (checkDataEmpty($aData)) {
    //                 if (!HotelModel::isEmailExist($aData['email'])) {
    //                     if ($this->verifyToken($aData['token'])) {
    //                         $status = HotelModel::insert($aData);
    //                         if ($status) {
    //                             echo HandleResponse::success('create the hotel successfully');
    //                         } else {
    //                             throw new Exception('create the hotel errors', 401);
    //                         }
    //                     }
    //                 } else {
    //                     throw new Exception('Sorry,the email is exist');
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }

    // public function updateHotel($aData)
    // {
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataEmpty($aData)) {
    //             if (checkDataIsset(['MaKS'], $aData)) {
    //                 if ($this->verifyToken($aData['token'])) {
    //                     if (!BlogModel::isEmailExist($aData['email'])) {
    //                         $status = BlogModel::update($aData['MaKS'], $aData);
    //                         if ($status) {
    //                             echo HandleResponse::success('The hotel is update successfully');
    //                         } else {
    //                             throw new Exception('The hotel is update not successfully', 401);
    //                         }
    //                     } else {
    //                         throw new Exception('Sorry,the email is exist');
    //                     }
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }

    // public function deleteBlog($aData)
    // {
    //     $aData['token'] = $this->getTokenHeaders();
    //     try {
    //         if (checkDataEmpty($aData)) {
    //             if ($this->verifyToken($aData['token'])) {
    //                 $status = BlogModel::delete($aData['ID']);
    //                 if ($status) {
    //                     echo HandleResponse::success('The blog is delete successfully');
    //                 } else {
    //                     throw new Exception('The blog is delete not successfully', 401);
    //                 }
    //             }
    //         }
    //     } catch (Exception $exception) {
    //         echo HandleResponse::error($exception->getMessage(), $exception->getCode());
    //     }
    // }
}
