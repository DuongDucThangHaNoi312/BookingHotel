<?php

use BookingHotel\Core\URL;
use BookingHotel\Models\LocationModel;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';
$aRow = LocationModel::getLocations();
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
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên Địa Điểm</th>
                        <th>Địa Điểm</th>
                        <th>Chi Tiết</th>
                        <th>Ảnh</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($aRow as $key => $aVal): ?>
                        <tr class="odd gradeX" align="center">
                            <td><?= $i ?></td>
                            <td><?= $aVal[1] ?></td>
                            <td><?= $aVal[3] ?></td>
                            <td style="text-align: center"><?= html_entity_decode(the_excerpt($aVal[2])) . '...' ?></td>
                            <td style="float: left;width: 120px;text-align: center"><?php LoadAnh($aVal[4]); ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="<?= URL::uri('a.deleteLocation') . '/' . $aVal[0] ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="<?= URL::uri('a.editLocation') . '/' . $aVal[0] ?>">Edit</a></td>
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