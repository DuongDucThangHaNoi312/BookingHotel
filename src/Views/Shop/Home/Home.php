<?php

use BookingHotel\Core\URL;
use BookingHotel\Models\LocationModel;

require_once 'src/Views/Shop/header.php';
require_once 'src/Views/Shop/navigation.php';
?>
    <div class="hero">
        <section class="home-slider owl-carousel">
            <div class="slider-item"
                 style="background-image:url(https://c4.wallpaperflare.com/wallpaper/470/673/182/nha-trang-beach-tour-1-wallpaper-preview.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Nha Trang</h1>
                                <h2>Điểm Du Lịch,Nghỉ Dưỡng,Sinh Thái</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item"
                 style="background-image:url(https://file1.dangcongsan.vn/data/0/images/2020/04/02/hacuong/46401633.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Hà Nội</h1>
                                <h2>Hà Nội Nghìn Năm Văn Hiến</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item"
                 style="background-image:url(https://sites.google.com/site/dialitinhthainguyen/_/rsrc/1468738799975/thu-vien-hinh-anh/hinh-anh-tieu-bieu-ve-thai-nguyen/ban-nhot-motul-chinh-hang-tai-thai-nguyen-201.jpg?height=269&width=400);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Thái Nguyên</h1>
                                <h2>Đầu Não Của Chiến Khu Việt Bắc</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">
                    <form action="<?=URL::uri('searchHotels')?>" method="POST" class="booking-form">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="checkInDateSearch">Check-in Date</label>
                                        <input name="chekInDate" required id="checkInDateSearch" type="text"
                                               class="form-control checkin_date"
                                               placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="checkOutDateSearch">Check-out Date</label>
                                        <input name="checkOutDate" id="checkOutDateSearch" type="text"
                                               class="form-control checkout_date"
                                               required
                                               placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="location">Khu Vực</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="MaDD" id="locationSearch" class="form-control">
                                                    <?php
                                                    $aLocation = LocationModel::getLocations();
                                                    foreach ($aLocation as $location):
                                                    ?>
                                                    <option value="<?=$location[0]?>"><?=$location[1]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Guests</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">1 Adult</option>
                                                    <option value="">2 Adult</option>
                                                    <option value="">3 Adult</option>
                                                    <option value="">4 Adult</option>
                                                    <option value="">5 Adult</option>
                                                    <option value="">6 Adult</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                                    <button id="btn-search-hotels" class="btn btn-black py-5 py-md-3 px-4
                                    align-self-stretch
                                    d-block"><span>Check Availability</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-wrap">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url(assets/Shop/images/room-3.jpg);">
                        <div class="text text-center pb-2">
                            <h3>Special Rooms</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url(assets/Shop/images/swimming-pool.jpg);">
                        <div class="text text-center pb-2">
                            <h3>Swimming Pool</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url(assets/Shop/images/resto.jpg);">
                        <div class="text text-center pb-2">
                            <h3>Restaurant</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="services-wrap img align-items-end d-flex"
                         style="background-image: url(assets/Shop/images/sleep.jpg);">
                        <div class="text text-center pb-2">
                            <h3 class="mb-0">Suites &amp; Rooms</h3>
                            <span>Special Rooms</span>
                            <div class="d-flex mt-2 justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to Roxandrea Hotel</span>
                    <h2 class="mb-4">A New Vision of Luxury Hotel</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-reception-bell"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Friendly Service</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-car"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Transfer Services</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-spa"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Suits &amp; SPA</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-bed"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Cozy Rooms</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Location Hotel</span>
                    <h2 class="mb-4">Location Hotels</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="room-wrap">
                        <div class="img d-flex align-items-center"
                             style="background-image: url(assets/Shop/images/bg_3.jpg);">
                            <div class="text text-center px-4 py-4">
                                <h2>Welcome to system <a href="index.html">Eternity</a> Hotel</h2>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                foreach ($aLocation as $aItem):
                    $srcIMG = json_decode($aItem['4'], true)[0];
                    ?>
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex">
                            <a href="<?= URL::uri('location') . '/' . $aItem[0] ?>" class="img"
                               style="background-image: url(<?= $srcIMG ?>);"></a>
                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 p-xl-5 text-center">
                                    <p class="star mb-0"><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span><span
                                                class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                    <p class="mb-0"><span class="per">Khu Vực</span></p>
                                    <h3 class="mb-3"><a href="<?= URL::uri('location') . '/' . $aItem[0] ?>"><?=$aItem[1]?></a></h3>
                                    <p class="pt-1"><a href="<?= URL::uri('location') . '/' . $aItem[0] ?>" class="btn-custom px-3 py-2">Xem Chi
                                            Tiết<span class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Our Happy Guest Says</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 ftco-animate">
                    <div class="row ftco-animate">
                        <div class="col-md-12">
                            <div class="carousel-testimony owl-carousel ftco-owl">
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4"
                                             style="background-image: url(assets/Shop/images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="star"><span class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span class="ion-ios-star"></span>
                                            </p>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Nathan Smith</p>
                                            <span class="position">Guests</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4"
                                             style="background-image: url(assets/Shop/images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="star"><span class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span class="ion-ios-star"></span>
                                            </p>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Nathan Smith</p>
                                            <span class="position">Guests</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="star"><span class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span class="ion-ios-star"></span>
                                            </p>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Nathan Smith</p>
                                            <span class="position">Guests</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4"
                                             style="background-image: url('assets/Shop/images/person_1.jpg')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="star"><span class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span class="ion-ios-star"></span>
                                            </p>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Nathan Smith</p>
                                            <span class="position">Guests</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4"
                                             style="background-image: url(assets/Shop/images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="star"><span class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span
                                                        class="ion-ios-star"></span><span class="ion-ios-star"></span>
                                            </p>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Nathan Smith</p>
                                            <span class="position">Guests</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Read Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                           style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                           style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                           style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text mt-3 text-center">
                            <div class="meta mb-2">
                                <div><a href="#">July 03, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <p><a href="#" class="btn-custom">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Photos</span>
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="assets/uploads/6909688416146fb66c48210.33071835.jpg" class="insta-img image-popup"
                       style="background-image: url(assets/uploads/6909688416146fb66c48210.33071835.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="assets/uploads/7257669526147430fcf3674.43101840.jpg" class="insta-img image-popup"
                       style="background-image: url(assets/uploads/7257669526147430fcf3674.43101840.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="assets/uploads/8886956696146fc59e4ca63.99132776.jpg" class="insta-img image-popup"
                       style="background-image: url(assets/uploads/8886956696146fc59e4ca63.99132776.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="assets/uploads/187042850461470011511852.15265799.jpg" class="insta-img image-popup"
                       style="background-image: url(assets/uploads/187042850461470011511852.15265799.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="assets/uploads/673696446147417f4b47a9.67030792.jpg" class="insta-img image-popup"
                       style="background-image: url(assets/uploads/673696446147417f4b47a9.67030792.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php
require_once 'src/Views/Shop/footer.php';
