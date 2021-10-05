<?php

namespace BookingHotel\Controllers\Admin\Blog;

use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Database\Location\LocationDB;
use BookingHotel\Models\BlogModel;
use Exception;

class BlogController
{
    public function getEditView()
    {
        include 'src/Views/Admin/Blog/EditBlog.php';
    }

    public function getAddView()
    {
        include 'src/Views/Admin/Blog/AddBlog.php';
    }

    public function getListView()
    {
        include 'src/Views/Admin/Blog/ListBlog.php';
    }

    public function handleAdd()
    {


        $aData = $_POST;
        // var_dump( $aData );      
        try {
            if (checkDataEmpty($aData)) {
               
                $id = BlogModel::insert($aData);
                if ($id) {
                    URL::redirect('a.listBlog');
                } else {
                    throw new Exception('sorry, the location had not inserted successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_addBlog', $exception->getMessage());
            URL::redirect('a.addBlog');
        }
    }

    public function handleEdit()
    {
        $aData = $_POST;
        try {
            if (checkDataEmpty($aData)) {
                $aData['image'] = json_encode($aData['images']);
                $id = BlogModel::update($aData['id'], $aData);
                if ($id) {
                    URL::redirect('a.listBlog');
                } else {
                    throw new Exception('sorry, the blog had not updated successfully');
                }
            }
        } catch (Exception $exception) {
            Session::set('error_updateBlog', $exception->getMessage());
            URL::redirect('a.updateBlog');
        }
    }

    public function handleDelete()
    {
      $id=Request::getIDOnURL();
        try {
            $id = BlogModel::delete($id);
                if ($id) {
                    URL::redirect('a.listBlog');
                } else {
                    throw new Exception('sorry, the blog had not updated successfully');
                }
        } catch (Exception $exception) {
            Session::set('error_updateBlog', $exception->getMessage());
            URL::redirect('a.listBlog');
        }
    }
}