<?php
//CheckLoginAdmin();
use BookingHotel\Core\Request;
use BookingHotel\Core\Session;
use BookingHotel\Core\URL;
use BookingHotel\Models\BlogModel;
use BookingHotel\Models\LocationModel;

require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';
$ID = Request::getIDOnURL();
$aRow = BlogModel::getBlog($ID);

?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog
                        <small>edit</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_updateBlog'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $_SESSION['error_updateBlog'] ?>
                        </div>
                    <?php endif ?>
                    <form action="<?= URL::uri('a.editBlog'); ?>" method="POST" enctype="multipart/form-data"
                          novalidate>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" name="id" value="<?= $aRow['id'] ?>">
                            <input class="form-control" type="text" name="name" value="<?= $aRow['name'] ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="10" name="content" id="editor1" required>
                                <?= $aRow['content'] ?>
                            </textarea>
                        </div>

                        <!-- <div class="form-group">
                            <input class="form-control" type="hidden" name="imgUser" value="img">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" name="user" value="Admin">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" name="type" value="0">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" name="favorite" value="0">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" name="comment" value="0">
                        </div> -->

                        
                        
                      
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">SAVE Blog</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php
Session::checkReloadPage('error_updateLocation');
require_once 'src/Views/Admin/footer.php';