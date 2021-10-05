<?php
require_once 'src/Views/Admin/header.php';
?>
    <div class="container">
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 ">
                <div class="login-panel panel panel-default ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($_SESSION['error_adminLogin'])):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?=$_SESSION['error_adminLogin']?>
                            </div>
                        <?php endif?>
                        <form role="form" action="<?=\BookingHotel\Core\URL::uri('a.login')?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text"
                                           autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="alert alert-success alert-dismissible">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.-->
<!--    </div>-->
<!--    <div class="alert alert-info alert-dismissible">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.-->
<!--    </div>-->
<!--    <div class="alert alert-warning alert-dismissible">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.-->
<!--    </div>-->
<!--    <div class="alert alert-danger alert-dismissible">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.-->
<!--    </div>-->
<?php
require_once 'src/Views/Admin/footer.php';
