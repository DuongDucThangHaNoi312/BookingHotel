<?php

use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;

CheckLoginAdmin();
require_once 'src/Views/Admin/header.php';
require_once 'src/Views/Admin/navigation.php';
$row = HotelModel::getHotels();
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên Khách Sạn</th>
                        <th>Địa Chỉ</th>
                        <th>Website</th>
                        <th>Chi tiết</th>
                        <th>Ảnh</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($row as $key => $val): ?>
                        <tr class="odd gradeX" align="center">
                            <td><?= $i ?></td>
                            <td><?= $val[2] ?></td>
                            <td><?= $val[4] ?></td>
                            <td><?= $val[7] ?></td>
                            <td style="text-align: center"><?= html_entity_decode(the_excerpt($val[3])) . '...' ?></td>
                            <td style="float: left;width: 120px;text-align: center"><?php LoadAnh($val[9]); ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="<?= URL::uri('a.deleteHotel') . '/' . $val[0] ?>">
                                    Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="<?= URL::uri('a.editHotel') . '/' .
                                        $val[0] ?>">Edit</a></td>
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