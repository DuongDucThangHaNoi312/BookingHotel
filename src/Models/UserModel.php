<?php


namespace BookingHotel\Models;


use BookingHotel\Database\DB;


class UserModel
{
    public static function isLogin($aData): bool
    {
        $db = DB::Connect();
        $result = $db->query("SELECT ID FROM users where username='" . $db->escape_string($aData['username']) .
            "' AND password='" . md5($db->escape_string($aData['password'])) . "'");
        return !empty($result->num_rows);
    }

    public static function getUserWithID($id): array
    {
        return DB::Connect()->query("SELECT * FROM users WHERE ID='" . $id . "'")->fetch_assoc();
    }

    public static function checkCodeRenewPassword($id, $code): bool
    {
        $result = DB::Connect()->query("SELECT ID FROM users WHERE code='" . $code . "' AND ID='" . $id . "'");
        return !empty($result->num_rows);
    }

    public static function getQRCode($userID): string
    {
        $result = DB::Connect()->query("SELECT qrcode FROM users WHERE ID='".$userID."'")->fetch_assoc();
        return !empty($result) ? $result['qrcode'] : '';
    }

    public static function isUserExist($userName): bool
    {
        return !empty(self::getID($userName));
    }

    public static function getID($userName): int
    {
        $ID = DB::Connect()->query("SELECT ID FROM users WHERE userName='" . $userName . "'")->fetch_assoc();
        return (!empty($ID)) ? $ID['ID'] : 0;
    }

    public static function isEmailExist($email): bool
    {
        return !empty(self::getIDWithEmail($email));
    }

    public static function getIDWithEmail($email): int
    {
        $result = DB::Connect()->query("SELECT ID FROM users WHERE email='" . $email . "'");
        return ($result->num_rows > 0) ? ($result->fetch_assoc())['ID'] : 0;
    }

    public static function isUserAdmin($email): bool
    {
        $query = DB::Connect()->query("SELECT * FROM users WHERE email='" . $email . "' AND level=1 ")
            ->fetch_assoc();
        return !empty($query);
    }

    public static function insert($aData): int
    {
        if (!isset($aData['role'])) {
            $aData['role'] = 3;
        }
        $sql
            = "INSERT INTO `users`(`ID`, `hoTen`, `username`, `password`, `SDT`, `level`, `token`,`email`, `code`, `createDate`) VALUES (null,'" .
            $aData['hoTen'] . "','" . $aData['username'] . "','" . $aData['password'] . "'," . $aData['SDT'] . ",'" .
            $aData['role'] . "','','" . $aData['email'] . "','',null)";
        $insert = DB::Connect()
            ->query($sql);
        if ($insert) {
            return self::getID($aData['username']);
        }
        return 0;
    }

    public static function updateToken($id, $token)
    {
        return DB::Connect()->query("UPDATE  users SET token='" . $token . "' WHERE ID='" . $id . "'");
    }

    public static function updateQRCode($id, $QRCode)
    {
        return DB::Connect()->query("UPDATE  users SET qrcode='" . $QRCode . "' WHERE ID='" . $id . "'");
    }

    public static function getAllUser(): ?array
    {
        return DB::Connect()->query("SELECT * FROM users")->fetch_all();
    }

    public static function update($id, $aData)
    {
        $query = [];
        if ($aData['hoTen'] ?? '') {
            $query[] = " hoTen ='" . $aData['hoTen'] . "'";
        }
        if ($aData['username'] ?? '') {
            $query[] = " username ='" . $aData['username'] . "'";
        }
        if ($aData['SDT'] ?? '') {
            $query [] = " SDT = '" . $aData['SDT'] . "'";
        }
        if ($aData['email'] ?? '') {
            $query [] = " email = '" . $aData['email'] . "'";
        }
        if ($aData['code'] ?? '') {
            $query [] = " code = '" . $aData['code'] . "'";
        }
        if ($aData['role'] ?? '') {
            $query [] = " level = '" . $aData['role'] . "'";
        }
        return DB::Connect()->query("UPDATE `users` SET " . implode(',', $query) .
            ",`createDate`=null WHERE ID='" .
            $id . "'");
    }

    public static function delete($ID)
    {
        return DB::Connect()->query("DELETE FROM `users` WHERE ID='" . $ID . "'");
    }

    public static function handleLogin($aData)
    {
        if (isset($aData['username'])){
            $where="username='" . DB::Connect()->real_escape_string($aData['username']) . "' AND password='" .
                DB::Connect()->real_escape_string(md5($aData['password'])) . "'";
        }else{
            $where="email='" . DB::Connect()->real_escape_string($aData['email']) . "' AND password='" . DB::Connect()->real_escape_string(md5($aData['password'])) . "'";
        }
        $sql = "SELECT ID FROM users WHERE ".$where;
        $status = DB::Connect()->query($sql);
        return (!empty($status->num_rows)) ? ($status->fetch_assoc())['ID'] : false;
    }

    public static function getTokenWithUserID($userID): string
    {
        $data = DB::Connect()->query("SELECT token FROM users WHERE ID='" . $userID . "'")->fetch_assoc();
        return $data['token'];
    }

    public static function checkPasswordExist($userID, $password): bool
    {
        $query = DB::Connect()->query("SELECT ID FROM users WHERE ID='" . $userID . "' AND password='" .
            $password . "'")
            ->fetch_assoc();
        return !empty($query);
    }
}