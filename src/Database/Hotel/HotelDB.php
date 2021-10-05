<?php

namespace BookingHotel\Database\Hotel;

use BookingHotel\Database\DB;

class HotelDB
{
    public function __construct()
    {
        $this->createTableHotel();
    }

    public function createTableHotel(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS hotels (
  MaKS int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    MaDD int(11) UNSIGNED NOT NULL,
  tenKS text NOT NULL,
  content text NOT NULL,
  diaChi text NOT NULL,
  tenMien text NOT NULL,
  email text NOT NULL,
  website text NOT NULL,
  rating text NOT NULL,
  image text NOT NULL,
  createDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (MAKS)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        DB::Connect()->query($sql);
        $sqlForeignKey = 'ALTER TABLE `hotels`
  ADD CONSTRAINT `fk_1212232` FOREIGN KEY (`MaDD`) REFERENCES `locations` (`MaDD`) ON DELETE CASCADE';
        DB::Connect()->query($sqlForeignKey);
        return true;
    }
}