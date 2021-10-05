<?php

use BookingHotel\Core\URL;
use BookingHotel\Models\BlogModel;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';
$aRow = BlogModel::getBlogs();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Locations
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">STT</th>
                        <th style="text-align: center;"> Title</th>
                        <th style="text-align: center;">Content</th>
                        <th style="text-align: center;"> Delete</th>
                        <th style="text-align: center;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($aRow as $key => $aVal) : ?>
                        <tr class="odd gradeX" align="center">
                            <td><?= $i ?></td>
                            <td><?= $aVal[1] ?></td>
                            <td><?= $aVal[2] ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?= URL::uri('a.deleteBlog') . '/' . $aVal[0] ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?= URL::uri('a.editBlog') . '/' . $aVal[0] ?>">Edit</a></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php
require_once 'src/Views/Admin/footer.php';
