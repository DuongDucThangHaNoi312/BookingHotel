<?php

namespace BookingHotel\Controllers\Shop\Login;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Core\URL;
use BookingHotel\Models\UserModel;
use Exception;

class LoginController
{
    use TrainJWT;

    public function getViewLogin()
    {
        include getcwd() . '/src/Views/Shop/Login/Login.php';
    }

    public function getViewRegister()
    {
        include getcwd() . '/src/Views/Shop/Login/Register.php';
    }

    public function handleRegister()
    {
        $aData = $_POST;
        $aData['password'] = md5($_POST['password']);
        $aData['SDT'] = (int)$_POST['SDT'];
        try {
            if (checkDataIsset(['hoTen', 'email', 'password', 'SDT'], $aData)) {
                if (checkDataEmpty($aData)) {
                    if (!UserModel::isEmailExist($aData['email'])) {
                        $userID = UserModel::insert($aData);
                        if ($userID ?? '') {
                            $token = $this->encodeJWT([
                                'ID'       => $userID,
                                'username' => $aData['username'],
                                'hoTen'    => $aData['hoTen'],
                                'email'    => $aData['email'],
                            ]);
                            UserModel::updateToken($userID, $token);
                            URL::redirect('login');
                        } else {
                            throw new Exception('The account not create successfully', 401);
                        }
                    } else {
                        throw new Exception('The email is exist', 400);
                    }
                }
            }
        } catch (Exception $exception) {
            Session::set('error_shopRegisterUser', $exception->getMessage());
            URL::redirect('register');
        }
    }

    public function handleLogin()
    {
        $aData = $_POST;
        try {
            if (checkDataIsset(['email', 'password'], $aData)) {
                if (checkDataEmpty($aData)) {
                    $ID = UserModel::handleLogin($aData);
                    if ($ID) {
                        $aUser = UserModel::getUserWithID($ID);
                        Session::set('isUserLogin', true);
                        Session::set('userID', $ID);
                        Session::set('email', $aUser['email']);
                        Session::set('hoTen', $aUser['hoTen']);
                        URL::redirect('');
                    } else {
                        throw new Exception('Sorry, The account login error', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            Session::set('error_shopLoginUser', $exception->getMessage());
            URL::redirect('login');
        }
    }

    public function handleLogout()
    {
        Session::destroyAll();
        URL::redirect('');
    }
}