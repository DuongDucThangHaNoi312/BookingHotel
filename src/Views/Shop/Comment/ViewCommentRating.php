<?php

use BookingHotel\Core\URL;
use BookingHotel\Models\CommentModel;
use BookingHotel\Models\OrderModel;

?>
<div class="col-md-12 properties-single ftco-animate mb-5 mt-4" style="background-color: white;">
    <div class="container">
        <div class="col-md-12">
            <div class="offer-dedicated-body-left">
                <div class="tab-content" id="pills-tabContent" aria-labelledby="pills-restaurant-info-tab">
                    <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel"
                         aria-labelledby="pills-reviews-tab">
                        <div id="ratings-and-reviews"
                             class="bg-white rounded shadow-sm p-4 mb-4 clearfix restaurant-detailed-star-rating">
                    <span class="star-rating float-right">
                        <?php
                        ///tổng lượng comment trong đb nhân với 5
                        $totalCmm = CommentModel::getSumCommentRatings($aRoom['MaPhong']);

                        $rating5star = CommentModel::getSumCommentRating($aRoom['MaPhong'], 5);
                        $rating4star = CommentModel::getSumCommentRating($aRoom['MaPhong'], 4);
                        $rating3star = CommentModel::getSumCommentRating($aRoom['MaPhong'], 3);
                        $rating2star = CommentModel::getSumCommentRating($aRoom['MaPhong'], 2);
                        $rating1star = CommentModel::getSumCommentRating($aRoom['MaPhong'], 1);
                        //tổng lượng cmm thật có
                        $sumCmm=($rating5star + $rating4star + $rating3star + $rating2star + $rating1star);

                        //tính lượng rating trung bình
                        $condition = (!empty($totalCmm) && !empty($sumCmm)) ? ceil(( $sumCmm/ $totalCmm)*5) : 0;
                        for ($i = 0; $i < $condition; $i++):
                            echo ' <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>';
                        endfor; ?>
                              </span>
                            <h5 class="mb-0 pt-1">Rate this Place</h5>
                        </div>
                        <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                            <h5 class="mb-0 mb-4">Ratings and Reviews</h5>
                            <div class="graph-star-rating-header">
                                <p class="text-black mb-4 mt-2"></p>
                            </div>
                            <div class="graph-star-rating-body">
                                <div class="rating-list">
                                    <div class="rating-list-left text-black">
                                        5 Star
                                    </div>
                                    <div class="rating-list-center">
                                        <div class="progress">
                                            <?php $percent5star = (!empty($sumCmm) && !empty($rating5star)) ?
                                            ceil(($rating5star / $sumCmm)*100) : 0; ?>
                                            <div style="width: <?= $percent5star ?>%" aria-valuemax="5"
                                                 aria-valuemin="0" aria-valuenow="5"
                                                 role="progressbar"
                                                 class="progress-bar bg-primary">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-list-right text-black"><?= $percent5star ?>%</div>
                                </div>
                                <div class="rating-list">
                                    <div class="rating-list-left text-black">
                                        4 Star
                                    </div>
                                    <div class="rating-list-center">
                                        <div class="progress">
                                            <?php $percent4star = (!empty($sumCmm) && !empty($rating4star)) ?
                                            ceil(($rating4star / $sumCmm)*100) : 0; ?>
                                            <div style="width: <?= $percent4star ?>%" aria-valuemax="5"
                                                 aria-valuemin="0" aria-valuenow="5"
                                                 role="progressbar"
                                                 class="progress-bar bg-primary">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-list-right text-black"><?= $percent4star ?>%</div>
                                </div>
                                <div class="rating-list">
                                    <div class="rating-list-left text-black">
                                        3 Star
                                    </div>
                                    <div class="rating-list-center">
                                        <div class="progress">
                                            <?php $percent3star = (!empty($sumCmm) && !empty($rating3star)) ?
                                            ceil(($rating3star / $sumCmm)*100) : 0; ?>
                                            <div style="width: <?= $percent3star ?>%" aria-valuemax="5"
                                                 aria-valuemin="0" aria-valuenow="5"
                                                 role="progressbar"
                                                 class="progress-bar bg-primary">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-list-right text-black"><?= $percent3star ?>%</div>
                                </div>
                                <div class="rating-list">
                                    <div class="rating-list-left text-black">
                                        2 Star
                                    </div>
                                    <div class="rating-list-center">
                                        <div class="progress">
                                            <?php $percent2star = (!empty($sumCmm) && !empty($rating2star)) ?
                                            ceil(($rating2star / $sumCmm)*100) : 0; ?>
                                            <div style="width: <?= $percent2star ?>%" aria-valuemax="5"
                                                 aria-valuemin="0" aria-valuenow="5"
                                                 role="progressbar"
                                                 class="progress-bar bg-primary">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-list-right text-black"> <?= $percent2star ?>%</div>
                                </div>
                                <div class="rating-list">
                                    <div class="rating-list-left text-black">
                                        1 Star
                                    </div>
                                    <div class="rating-list-center">
                                        <div class="progress">
                                            <?php $percent1star = (!empty($sumCmm) && !empty($rating1star)) ?
                                            ceil(($rating1star / $sumCmm)*100) : 0; ?>
                                            <div style="width: <?= $percent1star ?>%" aria-valuemax="5"
                                                 aria-valuemin="0" aria-valuenow="5"
                                                 role="progressbar"
                                                 class="progress-bar bg-primary">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating-list-right text-black"> <?= $percent1star ?>%</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                            <a href="#" class="btn btn-outline-primary btn-sm float-right">Top
                                Rated</a>
                            <h5 class="mb-1">All Ratings and Reviews</h5>
                            <?php
                            $aComment = CommentModel::getCommentsByMaPhong($aRoom['MaPhong']);
                            if (!empty($aComment)) {
                                foreach ($aComment as $item):
                                    ?>
                                    <div class="reviews-members pt-4 pb-4">
                                        <div class="media">
                                            <a href="#"><img alt="Generic placeholder image"
                                                             src="http://bootdey.com/img/Content/avatar/avatar1.png"
                                                             class="mr-3 rounded-pill"></a>
                                            <div class="media-body">
                                                <div class="reviews-members-header">
                                    <span class="star-rating float-right">
                                        <?php for ($i = 0; $i < $item[2]; $i++):
                                            echo ' <a href="#"><i class="icofont-ui-rating active"></i></a>';
                                        endfor; ?>
                                          </span>
                                                    <h6 class="mb-1"><a class="text-black" href="#"><?= $item[0] ?></a>
                                                    </h6>
                                                    <p class="text-gray"><?= $item[3] ?></p>
                                                </div>
                                                <div class="reviews-members-body">
                                                    <?= html_entity_decode($item[1]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                <?php
                                endforeach;
                            } else {
                                echo '
                                  <div class="reviews-members pt-4 pb-4">
                                  <h2>Sorry, The Room is not comment.</h2>
                                   </div>
                                  ';
                            }
                            ?>
                            <hr>
                            <a class="text-center w-100 d-block mt-4 font-weight-bold" href="#">See
                                All Reviews</a>
                        </div>
                        <?php if (isset($_SESSION['isUserLogin'])):

                            if (OrderModel::checkUserOrderRoom($_SESSION['userID'], $aRoom['MaPhong'])):
                                ?>
                                <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                                    <h5 class="mb-4">Leave Comment</h5>
                                    <p class="mb-2">Rate the Place</p>
                                    <form method="POST" action="<?= URL::uri('commentShop') ?>">
                                        <input type="hidden" name="MaPhong" value="<?= $aRoom['MaPhong'] ?>">
                                        <input type="hidden" name="MaOrder"
                                               value="<?= OrderModel::getOrderIDWithUserIDAndRoomID($_SESSION['userID'],
                                                   $aRoom['MaPhong']) ?>">
                                        <div class="mb-4">
                                    <span class="star-rating"><?php include dirname(__FILE__) .
                                            '/ViewRating.php'; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Your Comment</label>
                                            <textarea class="form-control" name="content" id="editor1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm" type="submit">
                                                Submit Comment
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            endif;
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>