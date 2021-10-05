<?php

use BookingHotel\Core\Request;
use BookingHotel\Core\URL;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\LocationModel;
use BookingHotel\Models\RoomModel;

require_once 'src/Views/Shop/header.php';
require_once 'src/Views/Shop/navigation.php';

$aHotel = HotelModel::getHotelsWithLocationID($aLocation['MaDD']);

$srcLocation = json_decode($aLocation['image'], true)[0];
?>
    <div class="hero-wrap" style="background-image: url('<?= $srcLocation ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2">Home</span>/
                            <span>Location</span></p>
                        <h1 class="mb-4 bread"><?= $aLocation['tenDD'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section bg-light ftco-no-pb" style="margin-bottom: 30px">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Search</span>
                    <h2 class="mb-4">Search List Hottel In Location</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <?php foreach ($aHotel as $aItem):
                    $srcHotel = json_decode($aItem[9], true)[0];
                    ?>
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex">
                            <a href="<?= URL::uri('detailsRoom') . '/' . $aItem[0] ?>" class="img"
                               style="background-image:url(<?= $srcHotel ?>);"></a>
                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 p-xl-5 text-center">
                                    <p class="star mb-0"><span class="ion-ios-star">
                                    <p class="star mb-0">
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                    </p>
                                    <h3 class="mb-3"><?= $aItem[2] ?></h3>
                                    <p class="pt-1"><button id="btn-hotel_<?= $aItem[0] ?>" class="btn-custom px-3
                                    py-2">View Hotel
                                            Details <span class="icon-long-arrow-right"></span></button></p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_<?= $aItem[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header" style="display: block;margin: 0 auto">
                                        <h5 class="modal-title"><?=$aItem[2]?></h5>
                                    </div>
                                    <div class="modal-body modal-xl">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-4 ftco-animate">
                                                    <div class="single-slider owl-carousel">
                                                        <?php $aIMGHotel = json_decode($aItem[9], true);
                                                        foreach ($aIMGHotel as $src):
                                                            ?>
                                                            <div class="item">
                                                                <div class="room-img" style="background-image: url(<?=$src?>);"></div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8" style=" overflow: auto;height: 450px;">
                                                    <?=html_entity_decode($aItem[3])?>
                                                </div>
                                            </div>
                                            <h4 class="modal-title" style="text-align: center">Danh Sách Phòng</h4>
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên Phòng</th>
                                                    <th scope="col">Giá</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $aRoom = RoomModel::getRoomsByMaKS( $aItem[0]);
                                                if (empty($aRoom)){
                                                    echo 'sorry,we not found data';
                                                }
                                                $i=1;
                                                foreach ($aRoom as $room):
                                                    if (!in_array($aItem[0], $listIDRoomHasOrder)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$i?></th>
                                                        <td><?=$room[2]?></td>
                                                        <td><?=$room[4]?></td>
                                                        <td><a href="<?=URL::uri('detailsRoom').'/'.$room[0]?>"><button
                                                                    type="button"
                                                                    class="btn
                                                    btn-primary">View Detail</button></a></td>
                                                    </tr>
                                                    <?php $i++;} endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container mt-2">
            <h2>TÌNH HÌNH DỊCH BỆNH CORONA MỚI NHẤT</h2>
            <iframe data-lazyloaded="1" src="https://ncovi.vnpt.vn/views/ncovi_detail.html" frameborder="0"
                    data-src="https://ncovi.vnpt.vn/views/ncovi_detail.html" id="dantri-widget-corona-undefined"
                    allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" scrolling="yes"
                    style="width: 100%; height: 400px; overflow: hidden;" class="litespeed-loaded"
                    data-was-processed="true"></iframe>
        </div>
    </section>
<?php
require_once 'src/Views/Shop/footer.php';
