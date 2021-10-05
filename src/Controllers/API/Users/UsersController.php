<?php

namespace BookingHotel\Controllers\API\Users;

use BookingHotel\Core\HandleResponse;
use BookingHotel\Core\TrainJWT;
use BookingHotel\Models\UserModel;
use BookingHotel\Shares\TrainGetTokenHeader;
use Exception;

class UsersController
{
    use TrainJWT, TrainGetTokenHeader;

    private array $aDefineCreateUser = ['hoTen', 'username', 'password', 'SDT', 'role', 'email'];

    public function getUser($aData)
    {
        $aUser = UserModel::getUserWithID($aData['ID']);
        unset($aUser['token']);
        unset($aUser['password']);
        echo HandleResponse::success('data user', $aUser);
    }

    public function getUsers()
    {
        $aUser = [];
        $aData = UserModel::getAllUser();
        foreach ($aData as $oUSer) {
            $aUser[] = [
                'ID'         => $oUSer[0],
                'hoTen'      => $oUSer[1],
                'username'   => $oUSer[2],
                'email'      => $oUSer[7],
                'role'       => $oUSer[5],
                'qrcode'  => $oUSer[9],
                'createDate' => $oUSer[10],
            ];
        }
        echo HandleResponse::success('List user', $aUser);
    }

    public function renewPassword()
    {
        $aData = $_POST;
        if (checkValidateData($aData)) {
            if (strcmp($aData['password'], $aData['cfPassword']) == 0) {
                $oInfo = $this->decodeJWT($aData['token']);
                UserModel::update($oInfo->ID, [
                    'password' => md5($aData['password'])
                ]);
                echo Message::success('Your password has been changed successfully');
            } else {
                echo Message::error('your passwords must match', 401);
            }
        } else {
            echo Message::error('The param is not empty', 401);
        }
    }

    public function verifyPassword()
    {
        $aData = $_POST;
        if (checkValidateData($aData)) {
            $oInfo = $this->decodeJWT($aData['token']);
            $status = UserModel::checkPasswordExist($oInfo->ID, md5($aData['password']));
            if ($status) {
                echo Message::success('Congratulations,your password success');
            } else {
                echo Message::error('Sorry,the password is error', 401);
            }
        } else {
            echo Message::error('The param is not empty', 401);
        }
    }

    public function createUser()
    {
        $aData = $_POST;
        $aData['token'] = $this->getTokenHeaders();
        try {
            if (checkDataIsset($this->aDefineCreateUser, $aData)) {
                if (checkDataEmpty($aData)) {
                    $aData['password'] = md5($_POST['password']);
                    $aData['SDT'] = (int)$_POST['SDT'];
                    if (!UserModel::isEmailExist($aData['email'])) {
                        if ($this->verifyToken($aData['token'])) {
                            $userID = UserModel::insert($aData);
                            if ($userID ?? '') {
                                $token = $this->encodeJWT([
                                    'ID'       => $userID,
                                    'username' => $aData['username'],
                                    'hoTen'    => $aData['hoTen'],
                                    'email'    => $aData['email'],
                                ]);
                                UserModel::updateToken($userID, $token);
                                echo HandleResponse::success('The account create successfully');
                            } else {
                                throw new Exception('The account not create successfully', 401);
                            }
                        } else {
                            throw new Exception('User not permission access', 401);
                        }
                    } else {
                        throw new Exception('Sorry,the account is exist', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @throws Exception
     */
    public function updateUser($aData)
    {
        $aData['token'] = $this->getTokenHeaders();
        try {
            if ($this->verifyToken($aData['token'])) {
                if (checkDataIsset(['ID'], $aData)) {
                    if (checkDataEmpty($aData)) {
                        if (UserModel::isEmailExist($aData['email'])) {
                            $status = UserModel::update($aData['ID'], $aData);
                            if ($status) {
                                echo HandleResponse::success('The account is update successfully');
                            } else {
                                throw new Exception('The account is update not successfully', 401);
                            }
                        } else {
                            throw new Exception('Sorry,the email is exist');
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function deleteUser($aData)
    {
        $aData['token'] = $this->getTokenHeaders();
        try {
            if ($this->verifyToken($aData['token'])) {
                if (checkDataIsset(['ID'], $aData)) {
                    if (checkDataEmpty($aData)) {
                        $status = UserModel::delete($aData['ID']);
                        if ($status) {
                            echo HandleResponse::success('The account is delete successfully');
                        } else {
                            throw new Exception('The account is delete not successfully', 401);
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function handleLogin()
    {
        $aData = $_POST;
        try {
            if (checkDataIsset(['username', 'password'], $aData)) {
                if (checkDataEmpty($aData)) {
                    $ID = UserModel::handleLogin($aData);
                    if ($ID) {
                        echo HandleResponse::success('Congratulations, The account login successfully', [
                            'token' => UserModel::getTokenWithUserID($ID)
                        ]);
                    } else {
                        throw new Exception('Sorry, The account login error', 401);
                    }
                }
            }
        } catch (Exception $exception) {
            echo HandleResponse::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function sendEmail()
    {
        $aData = $_POST;
        try {
            checkDataIsset(['email'], $aData);
            if (empty($aData['email'])) {
                throw new Exception('The Email is not null');
            }
            if (!UserModel::isEmailExist($aData['email'])) {
                throw new Exception('Sorry,The Email is not exist in database');
            }
            $code = uniqid('vuongKMA_');
            $ID = UserModel::getIDWithEmail($aData['email']);
            $aUser = UserModel::getUserWithID($ID);
            UserModel::update($ID, [
                'code' => $code
            ]);
            $status = (new SendinblueController())
                ->setReceiver($aData['email'], $aUser['userName'])
                ->setUsername($aUser['userName'])
                ->setCode($code)
                ->sendMail();
            if ($status) {
                echo Message::success('send email successfully', [
                    'id' => $ID
                ]);
            }
        } catch (Exception $exception) {
            echo Message::error($exception->getMessage(), $exception->getCode());
        }
    }

    public function verifyCode()
    {
        $aData = $_POST;
        try {
            checkDataIsset(['code', 'password', 'id'], $aData);
            if (empty($aData['code']) || empty($aData['id']) || empty($aData['password'])) {
                throw new Exception('the param is not empty', 400);
            }
            if (UserModel::checkCodeRenewPassword($aData['id'], $aData['code'])) {
                $password = md5($aData['password']);
                UserModel::update($aData['id'], [
                    'password' => $password
                ]);
                echo Message::success('congratulations, the password renew successfully');
                die();
            }
            throw new Exception('sorry,we couldn\'t find code is not exist', 400);
        } catch (Exception $exception) {
            echo Message::error($exception->getMessage(), $exception->getCode());
        }
    }
}