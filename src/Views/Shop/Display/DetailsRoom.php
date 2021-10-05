<?php

use BookingHotel\Core\Request;
use BookingHotel\Models\HotelModel;
use BookingHotel\Models\RoomModel;

require_once 'src/Views/Shop/header.php';
require_once 'src/Views/Shop/navigation.php';
$idRoom = Request::getIDOnURL();
$aRoom = RoomModel::getRoom($idRoom);
$aHotel = HotelModel::getHotel($aRoom['MaKS']);
$srcHotel = json_decode($aHotel['image'], true)[0]
?>
    <div class="hero-wrap" style="background-image: url(<?= $srcHotel ?>);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2">Home</span> / <span><?= $aHotel['tenKS']
                                ?></span>
                        </p>
                        <h1 class="mb-4 bread"><?= $aHotel['tenKS'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <?php
                                foreach (json_decode($aRoom['image'], true) as $image):
                                    ?>
                                    <div class="item">
                                        <div class="room-img" style="background-image: url(<?= $image ?>);"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <h2 style="display: block;font-weight: bold;margin: 0 auto"><?= $aRoom['tenPhong'] ?></h2>
                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate" style="overflow: auto;height:
                        700px">
                            <?= $aRoom['content'] ?>
                        </div>
                        <?php include getcwd().'/src/Views/Shop/Comment/ViewCommentRating.php';?>
                    </div>
                </div>
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <button type="button" id="btn-booking_<?= $aRoom['MaPhong'] ?>" class="btn btn-lg btn-primary"
                                style="display: block;margin:0
                        auto">Đặt Ngay
                        </button>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div id="map" style="height: 400px"></div>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">dish</a>
                            <a href="#" class="tag-cloud-link">menu</a>
                            <a href="#" class="tag-cloud-link">food</a>
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">tasty</a>
                            <a href="#" class="tag-cloud-link">delicious</a>
                            <a href="#" class="tag-cloud-link">desserts</a>
                            <a href="#" class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                            necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                            consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
            <div class="modal fade" id="bookingModal_<?= $aRoom['MaPhong'] ?>" tabindex="-1"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header" style="display: block;margin: 0 auto">
                            <h5 class="modal-title">Chi Tiết Đặt Phòng</h5>
                        </div>
                        <div class="modal-body modal-xl">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Ngày Đến</label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" id="bookRoom_startDate" value="<?= date('Y-m-d\TH:i:s') ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Ngày Đi</label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" id="bookRoom_endDate" value="<?= date('Y-m-d\TH:i:s') ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Giá</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="bookRoom_gia" disabled readonly value="<?=
                                                $aRoom['gia'] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Tên
                                                    Phòng</label>
                                                <input type="hidden" id="bookRoom_idPhong" value="<?=$aRoom['MaPhong']?>">
                                                <div class="col-sm-10">
                                                    <input type="text" id="bookRoom_tenPhong" disabled readonly
                                                           value="<?= $aRoom['tenPhong'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="col-lg-12">
                                            <div class="room-wrap d-md-flex" style="height: 300px">
                                                <a href="" class="img"
                                                   style="background-image:url(<?= $srcHotel ?>);height: 300px;"></a>
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
                                                        <h3 class="mb-3"><?= $aHotel['tenKS'] ?></h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <h2>Nhập thông tin chi tiết của bạn</h2>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="bookRoom_email" class="form-label" style="font-weight: bold">Email address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           value="<?=isset($_SESSION['isUserLogin'])?$_SESSION['email']:''?>"
                                                           required
                                                           id="bookRoom_email"
                                                           aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bookRoom_fullName" class="form-label" style="font-weight: bold">Họ Và Tên</label>
                                                    <input type="text" required name="fullName"
                                                       value=" <?=isset($_SESSION['isUserLogin'])?$_SESSION['hoTen']:''?>"
                                                           class="form-control"
                                                           id="bookRoom_fullName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sdt" required class="form-label" style="font-weight: bold">Số
                                                        Điện Thoại</label>
                                                    <input type="number" name="sdt" class="form-control"
                                                           id="bookRoom_sdt">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bookRoom_request" class="form-label" style="font-weight: bold">Yêu Cầu Đặc Biệt</label>
                                                    <div id="emailHelp" class="form-text">Các yêu cầu đặc biệt không đảm bảo sẽ được đáp ứng – tuy nhiên, chỗ nghỉ sẽ cố gắng hết sức để thực hiện. Bạn luôn có thể gửi yêu cầu đặc biệt sau khi hoàn tất đặt phòng của mình!</div>
                                                    <textarea name="request" class="form-control" id="bookRoom_request"
                                                              rows="3"></textarea>
                                                </div>
                                                <button type="submit" id="btn-submit-bookRoom" class="btn btn-primary"
                                                        style="display: block;
                                                margin: 0 auto;">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div id="bookRoomQRCode"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require_once 'src/Views/Shop/footer.php';
