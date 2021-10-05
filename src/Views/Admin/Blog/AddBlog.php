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
                    <h1 class="page-header">Blog
                        <small>add</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-8" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['addBlog'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['addBlog'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.addBlog'); ?>" method="POST" enctype="multipart/form-data"
                          novalidate>
                        <div class="form-group">
                            <label>Tittle</label>
                            <input class="form-control" type="text" name="name" required/>
                        </div>
                      
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="10" name="content" id="editor1" required></textarea>
                        </div>


                        <!-- <div class="form-group">
                            <input class="form-control" type="text" name="imgUser" value="img">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="user" value="Admin">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="type" value="0">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="favorite" value="0">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="comment" value="0">
                        </div> -->

                      
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
