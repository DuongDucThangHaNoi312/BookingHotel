<?php

use BookingHotel\Core\URL;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';

?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Location
                        <small>add</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-8" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_addLocation'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['error_addLocation'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.addLocation'); ?>" method="POST" enctype="multipart/form-data"
                          novalidate>
                        <div class="form-group">
                            <label>Tên Địa Điểm</label>
                            <input class="form-control" type="text" name="tenDD" required/>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" name="diaChi" required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="10" name="content" id="editor1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="imagesLocation" name="images[]" multiple data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <div id="previewLocation" style="margin-top: 30px"></div>
                            <div id="inputIMGLocation"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">SAVE Location</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php
\BookingHotel\Core\Session::checkReloadPage('error_addLocation');
require_once 'src/Views/Admin/footer.php';
