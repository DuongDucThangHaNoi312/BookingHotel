<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?=\BookingHotel\Core\URL::uri()?>">Hotel Eternity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="<?=\BookingHotel\Core\URL::uri()?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="rooms.html" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="restaurant.html" class="nav-link">Restaurant</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=isset($_SESSION['isUserLogin'])?$_SESSION['hoTen']:'Account'?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=\BookingHotel\Core\URL::uri('login')?>">Login</a>
                        <a class="dropdown-item" href="#">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=\BookingHotel\Core\URL::uri('logout')?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
