<?php

namespace BookingHotel\Database\User;

use BookingHotel\Database\DB;
use BookingHotel\Models\UserModel;

class UserDB
{

    public function __construct()
    {
        $this->createTableUser();
    }

    public function createTableUser(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
  ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  hoTen text NOT NULL,
  username text NOT NULL,
  password varchar(100) NOT NULL,
  ngaySinh date NOT NULL,
  CMT varchar(11) NOT NULL,
  diaChi text NOT NULL,
  level int(11) NOT NULL DEFAULT 1,
  token text NOT NULL,
  email text NOT NULL,
  code text DEFAULT NULL,
  createDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        DB::Connect()->query($sql);
        if (!UserModel::isEmailExist('admin@gmail.com')) {
            $insertData = "INSERT INTO `users` (`ID`, `hoTen`, `username`, `password`, `ngaySinh`, `CMT`, `diaChi`, `level`, `token`, `email`, `code`, `createDate`) VALUES
(null , 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1998-04-27', '12232434', 'Hà Nội', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwiSUQiOjEsImVtYWlsIjoiYWRtaW5AZ21haWwuY29tIiwiaG9UZW4iOiJhZG1pbiJ9.HqArCyYFbt4KJDlw0gGHtWxnFtH35ZO5Id_iZIzINxE', 'admin@gmail.com', '', null);";
            DB::Connect()->query($insertData);
        }
        return true;
    }
}