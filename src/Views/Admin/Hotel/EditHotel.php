<?php

use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\LocationModel;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';

$ID = Request::getIDOnURL();
$aItem = HotelModel::getHotel($ID);
$aRowDD = LocationModel::getLocations();
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hotels
                        <small>update</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_editHotel'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['error_editHotel'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.editHotel'); ?>" method="POST" enctype="multipart/form-data"
                          novalidate>
                        <div class="form-group">
                            <input type="hidden" name="MaKS" value="<?= $aItem['MaKS'] ?>">
                            <label>Tên Khách Sạn</label>
                            <input class="form-control" type="text" name="tenKS" value="<?= $aItem['tenKS'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Địa Điểm</label>
                            <select class="form-control" name="MaDD" id="MaDD">
                                <?php foreach ($aRowDD as $key => $value): ?>
                                    <option <?= ($value[0] == $aItem['MaDD']) ? 'selected' : '' ?>
                                            value="<?= $value[0] ?>"><?= $value[1] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" name="diaChi" value="<?= $aItem['diaChi'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Tên Miền</label>
                            <input class="form-control" type="text" name="tenMien" value="<?= $aItem['tenMien'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input class="form-control" type="text" name="website" value="<?= $aItem['website'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $aItem['email'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="10" name="content" id="editor1" required>
                                <?= $aItem['content'] ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="imagesHotel" name="images[]" multiple data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <?php $aImage = json_decode($aItem['image'], true);
                            $preview = '';
                            $inputIMG = '';
                            foreach ($aImage as $src) {
                                $preview .= '<img src="' . $src . '" width="200px;" height="200px">';
                                $inputIMG .= '<input name="images[]" type="hidden" value="' . $src . '">';
                            }
                            ?>
                            <div id="preview" style="margin-top: 10px"><?= $preview ?></div>
                            <div id="inputIMG"><?= $inputIMG ?></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">SAVE HOTEL</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php
Session::checkReloadPage('error_editHotel');
require_once 'src/Views/Admin/footer.php';
