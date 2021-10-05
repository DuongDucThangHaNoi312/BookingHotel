<?php

namespace BookingHotel\Controllers\Admin\Login;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Models\UserModel;
use Exception;

class LoginController
{
    public function getView()
    {
        return include 'src/Views/Admin/Login/Login.php';
    }

    public function handleLogin()
    {
        $aData = $_POST;
        try {
            if (checkDataIsset(['username', 'password'], $aData)) {
                if (checkDataEmpty($aData)) {
                    $ID = UserModel::handleLogin($aData);
                    if ($ID) {
                        Session::set('isAdminLogin', true);
                        URL::redirect('a.dashboard');
                    } else {
                        throw new Exception('Sorry, The account login error', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            Session::set('error_adminLogin', $exception->getMessage());
            URL::redirect('a.login');
        }
    }
}