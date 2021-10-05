<?php

namespace BookingHotel\Controllers\Admin\Hotel;

use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;
use Exception;

class HotelController
{
    public function getEditView()
    {
        include 'src/Views/Admin/Hotel/EditHotel.php';
    }

    public function getAddView()
    {
        include 'src/Views/Admin/Hotel/AddHotel.php';
    }

    public function getListView()
    {
        include 'src/Views/Admin/Hotel/ListHotel.php';
    }

    public function handleAdd()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = HotelModel::insert($aData);
                if ($id) {
                    URL::redirect('a.listHotel');
                } else {
                    throw new Exception('sorry, the hotel had not inserted successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_addHotel', $exception->getMessage());
            URL::redirect('a.addHotel');
        }
    }

    public function handleEdit()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = HotelModel::update($aData['MaKS'], $aData);
                if ($id) {
                    URL::redirect('a.listHotel');
                } else {
                    throw new Exception('sorry, the hotel had not updated successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_editHotel', $exception->getMessage());
            URL::redirect('a.editHotel');
        }
    }
    public function handleDelete()
    {
        $MaKS=Request::getIDOnURL();
        try {
            $id=HotelModel::delete($MaKS);
            if ($id) {
                URL::redirect('a.listHotel');
            } else {
                throw new Exception('sorry, the hotel had not delete successfully');
            }
        } catch (Exception $exception) {
            URL::redirect('a.listHotel');
        }
    }
}