<?php

namespace BookingHotel\Database\Location;

use BookingHotel\Database\DB;

class LocationDB
{
    public function __construct()
    {
        $this->createTableLocation();
    }

    public function createTableLocation(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS locations (
  MaDD int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  tenDD text NOT NULL,
  content text NOT NULL,
  diaChi text NOT NULL,
    image text NOT NULL,
  createDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (MaDD)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        DB::Connect()->query($sql);
        return true;
    }
}