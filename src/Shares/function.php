<?php

use BookingHotel\Core\URL;


/**
 * @throws Exception
 */
function uploadFile($aData)
{
    $nameFile = '';
    $allowed = [
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/pdf',
        'application/vnd.ms-excel',
        'application/zip',
        'application/xml',
        'application/x-rar',
        'application/msword'
    ];
    if (in_array(strtolower($aData['type']), $allowed)) {
        $nameFile = $aData['name'];
        if (!move_uploaded_file($aData['tmp_name'], "./assets/uploads/files/" . $aData['name'])) {
            throw new Exception('Server problem', 400);
        }
        // Xoa file da duoc upload va ton tai trong thu muc tam
        if (isset($aData['tmp_name']) && is_file($aData['tmp_name']) && file_exists($aData['tmp_name'])) {
            unlink($aData['tmp_name']);
        }
    } else {
        throw new Exception('File Upload Không Đúng Định Dạng', 400);
    }
    return $nameFile;
}

/**
 * @throws Exception
 */
function checkDataEmpty($aData): bool
{
    foreach ($aData as $key => $data) {
        if (empty($data)) {
            $aError[] = $key;
        }
    }
    if (isset($aError)) {
        throw new Exception(sprintf("Sorry, The params %s is not null", implode(',', $aError)), 400);
    }
    return true;
}

/**
 * @throws Exception
 */
function checkDataIsset($defineData, $aRawData): bool
{
    $aKeyRawData = array_keys($aRawData);
    foreach ($defineData as $data) {
        if (!in_array($data, $aKeyRawData)) {
            $aError[] = $data;
        }
    }
    if (isset($aError)) {
        throw new Exception(sprintf("Sorry, The params %s is required", implode(',', $aError)), 400);
    }
    return true;
}

function CheckLoginAdmin()
{
    if (isset($_SESSION['isAdminLogin'])) {
        return true;
    } else {
        URL::redirect('a.login');
    }
}

function uploadImageMany($aData)
{
    $data = $aData['images'];
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'images/x-png', 'image/gif'];

// Kiem tra xem file upload co nam trong dinh dang cho phep
    for ($i = 0; $i < count($data['name']); $i++) {
        if (in_array(strtolower($data['type'][$i]), $allowed)) {
            // Neu co trong dinh dang cho phep, tach lay phan mo rong
            $ext = substr(strrchr($data['name'][$i], '.'), 1);
            $renamed = uniqid(rand(), true) . '.' . "$ext";
            $NameIMG[] = "./assets/uploads/" . $renamed;
            if (!move_uploaded_file($data['tmp_name'][$i], "./assets/uploads/" . $renamed)) {
                $errors[$data['name'][$i]] = "<p class='error'>Server problem</p>";
            }
            // Xoa file da duoc upload va ton tai trong thu muc tam
            if (isset($data['tmp_name'][$i]) && is_file($data['tmp_name'][$i]) &&
                file_exists($data['Images']['tmp_name'][$i])) {
                unlink($data['tmp_name'][$i]);
            }
        }
    }
    return json_encode($NameIMG);
}
function the_excerpt($text, $string = 400)
{
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    if (strlen($sanitized) > $string) {
        $cutString = substr($sanitized, 0, $string);
        return substr($sanitized, 0, strrpos($cutString, ' '));

    } else {
        return $sanitized;
    }

}

function LoadAnh($data)
{
    $adata = json_decode($data, true);
        foreach ($adata as $val) {
            ?>
            <a href="<?= $val ?>"><img src="<?= $val ?>" alt=""
                                                       style="width: 50px;height: 50px;float: left"></a>
            <?php
        }
}