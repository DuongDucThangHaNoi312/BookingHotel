<?php

use BookingHotel\Core\URL;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';

$aRowKS=\BookingHotel\Models\HotelModel::getHotels();
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rooms
                        <small>add</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_addRoom'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['error_addRoom'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.addRoom'); ?>" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label>Tên Phòng</label>
                            <input class="form-control" type="text" name="tenPhong" required/>
                        </div>
                        <div class="form-group">
                            <label>Khách Sạn</label>
                            <select class="form-control" name="MaKS" id="MaKS">
                                <?php foreach ($aRowKS as $key=>$value): ?>
                                    <option value="<?=$value[0]?>"><?=$value[2]?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Giá Phòng</label>
                            <input class="form-control" type="number" name="gia" required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="15" name="content" id="editor1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="imagesRoom" name="images[]" multiple data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5" required>
                            <div id="previewRoom"></div>
                            <div id="inputIMGRoom"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">SAVE Room</button>
                        </div>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php
\BookingHotel\Core\Session::checkReloadPage('error_addRoom');
require_once 'src/Views/Admin/footer.php';
