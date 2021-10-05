<?php

namespace BookingHotel\Controllers\Admin\Upload;

class UploadController
{
    public function handleUpload()
    {
        $jNameIMG=uploadImageMany($_FILES);
        echo json_encode(['status' => true, 'data' => $jNameIMG]); die();
    }
}