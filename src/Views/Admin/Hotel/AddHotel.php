<?php

use BookingHotel\Core\URL;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';

$aRowDD=\BookingHotel\Models\LocationModel::getLocations();
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hotels
                        <small>add</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_addHotel'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['error_addHotel'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.addHotel'); ?>" method="POST" enctype="multipart/form-data"
                          novalidate>
                        <div class="form-group">
                            <label>Tên Khách Sạn</label>
                            <input class="form-control" type="text" name="tenKS" required/>
                        </div>
                        <div class="form-group">
                            <label>Địa Điểm</label>
                            <select class="form-control" name="MaDD" id="MaDD">
                                <?php foreach ($aRowDD as $key=>$value): ?>
                                    <option value="<?=$value[0]?>"><?=$value[1]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" name="diaChi" required/>
                        </div>
                        <div class="form-group">
                            <label>Tên Miền</label>
                            <input class="form-control" type="text" name="tenMien" required/>
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input class="form-control" type="text" name="website" required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="10" name="content" id="editor1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="imagesHotel" name="images[]" multiple data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <div id="preview"></div>
                            <div id="inputIMG"></div>
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
\BookingHotel\Core\Session::checkReloadPage('error_addHotel');
require_once 'src/Views/Admin/footer.php';
