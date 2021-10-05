<?php

namespace BookingHotel\Controllers\Admin\Room;

use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\RoomModel;
use Exception;

class RoomController
{
    public function getEditView()
    {
        include 'src/Views/Admin/Room/EditRoom.php';
    }

    public function getAddView()
    {
        include 'src/Views/Admin/Room/AddRoom.php';
    }

    public function getListView()
    {
        include 'src/Views/Admin/Room/ListRoom.php';
    }

    public function handleAdd()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = RoomModel::insert($aData);
                if ($id) {
                    URL::redirect('a.listRoom');
                } else {
                    throw new Exception('sorry, the Room had not inserted successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_addRoom', $exception->getMessage());
            URL::redirect('a.addRoom');
        }
    }

    public function handleEdit()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = RoomModel::update($aData['MaPhong'], $aData);
                if ($id) {
                    URL::redirect('a.listRoom');
                } else {
                    throw new Exception('sorry, the rooms had not updated successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_editRoom', $exception->getMessage());
            URL::redirect('a.editRoom');
        }
    }
    public function handleDelete()
    {
        $MaPhong=Request::getIDOnURL();
        try {
            $id=RoomModel::delete($MaPhong);
            if ($id) {
                URL::redirect('a.listRoom');
            } else {
                throw new Exception('sorry, the room had not delete successfully');
            }
        } catch (Exception $exception) {
            URL::redirect('a.listRoom');
        }
    }
}