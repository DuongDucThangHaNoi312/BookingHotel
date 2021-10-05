<?php

namespace BookingHotel\Controllers\Admin\Dashboard;

class DashboardController
{
    public function getView()
    {
        return include 'src/Views/Admin/Dashboard/Dashboard.php';
    }
}