<?php

namespace BookingHotel\Controllers\Admin\Location;

use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Database\Location\LocationDB;
use BookingHotel\Models\LocationModel;
use Exception;

class LocationController
{
    public function getEditView()
    {
        include 'src/Views/Admin/Location/EditLocation.php';
    }

    public function getAddView()
    {
        include 'src/Views/Admin/Location/AddLocation.php';
    }

    public function getListView()
    {
        include 'src/Views/Admin/Location/ListLocation.php';
    }

    public function handleAdd()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = LocationModel::insert($aData);
                if ($id) {
                    URL::redirect('a.listLocation');
                } else {
                    throw new Exception('sorry, the location had not inserted successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_addLocation', $exception->getMessage());
            URL::redirect('a.addLocation');
        }
    }

    public function handleEdit()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = LocationModel::update($aData['MaDD'], $aData);
                if ($id) {
                    URL::redirect('a.listLocation');
                } else {
                    throw new Exception('sorry, the location had not updated successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_updateLocation', $exception->getMessage());
            URL::redirect('a.updateLocation');
        }
    }

    public function handleDelete()
    {
      $MaDD=Request::getIDOnURL();
        try {
            $id=LocationModel::delete($MaDD);
                if ($id) {
                    URL::redirect('a.listLocation');
                } else {
                    throw new Exception('sorry, the location had not updated successfully');
                }
        } catch (Exception $exception) {
            Session::set('error_updateLocation', $exception->getMessage());
            URL::redirect('a.listLocation');
        }
    }
}